define(function(require) {

    var React = require('react');
    
    var Li = React.createClass({
        handleClick: function(event) {
            console.log(this.props.aco);
            var state = 'inherit';
            if (this.props.aco.inherit) {
                state = 'allow';
            } else if (this.props.aco.allowed) {
                state = 'deny';
            }
            console.log(state);
            this.props.handleClick(this.props.aco.alias, state)
        },
        render: function() {
            var color = this.props.aco.allowed ? 'success' : 'danger';
            var link = this.props.aco.alias;
            if (!this.props.aco.inherited) {
                link= <span className={'label label-' + color}>{link}</span>
            }
            if (this.props.aco.children.length > 0) {
                var ul = <Ul acos={this.props.aco.children} handleClick={this.props.handleClick}/>;
            }
            return (
                <div>
                    <li onClick={this.handleClick} className={'text-' + color}>{link}</li>
                    {ul}
                </div>
            );
        }
    });

    var Ul = React.createClass({
        render: function() {
            var acos = this.props.acos.map(function(aco){
                return(<Li key={aco.id} aco={aco} handleClick={this.props.handleClick}/>);
            }.bind(this));
            return (
                <ul>{acos}</ul>
            );
        }
    });

    return Ul;
});
