define(function(require) {

    var $ = require('jquery');
    var ReactDOM = require('reactdom');
    var React = require('react');
    var Ul = require('permissions/acos');
    
    var Tree = React.createClass({
        handleClick: function(aco, state) {
            $.ajax({
                url: '/api/permissions/setPermissions.json',
                dataType: 'json',
                method: "POST",
                data: {
                    aro: this.props.aro,
                    aco: aco,
                    state: state,
                },
                success: function(data) {
                    this.setState(data);
                }.bind(this),
                error: function(xhr, status, err) {
                    console.error(this.props.url, status, err.toString());
                }.bind(this)
            });
        },
        getInitialState: function() {
            return {acos: []};
        },
        componentDidMount: function() {
            $.ajax({
                url: '/api/permissions/actions/user.json',
                dataType: 'json',
                method: "POST",
                success: function(data) {
                    this.setState(data);
                }.bind(this),
                error: function(xhr, status, err) {
                    console.error(this.props.url, status, err.toString());
                }.bind(this)
            });
        },
        render: function() {
            return (
                <Ul acos={this.state.acos} handleClick={this.handleClick}/>
            );
        }
    });

    var tree = document.getElementById('tree');
    var aro = tree.getAttribute('data-aro-alias');
    ReactDOM.render(<Tree aro={aro} />, tree);

});
