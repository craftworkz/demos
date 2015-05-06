var ItemsOverview = React.createClass({displayName: "ItemsOverview",
  getInitialState: function() {
    return {data: []};
  },
  componentDidMount: function() {
    $.ajax({url: this.props.url, success: function(data) {
	  this.setState({data: data});
	}.bind(this)});
  },
  handleItemSubmit: function(item) {
	  var items = this.state.data;
	  var newItems = items.concat([item]);
	  this.setState({data: newItems});
	  
	  $.ajax({ 
		 url: "/items", 
		 type: 'POST', 
		 data: JSON.stringify(item), 
		 contentType: 'application/json'
	});
  },
  render: function() {
    return (
      React.createElement("div", null, 
        React.createElement(ItemsForm, {onItemSubmit: this.handleItemSubmit}), 
        React.createElement("hr", null), 
        React.createElement("h2", null, "Todolist"),
        React.createElement(ItemsList, {data: this.state.data})
      )
    );
  }
});

var ItemsForm = React.createClass({displayName: "ItemsForm",
  handleSubmit: function(e) {
	e.preventDefault();  
	var text = this.refs.text.getDOMNode().value.trim();
	this.props.onItemSubmit({"text": text});
    this.refs.text.getDOMNode().value = '';
  },
  render: function() {
    return (
    	React.createElement("form", {className: "form-inline", onSubmit: this.handleSubmit}, 
    		React.createElement("div", {className: "form-group"}, 
    			React.createElement("input", {type: "text", className: "form-control", ref: "text"})
    		),
    		React.createElement("button", {type: "submit", className: "btn btn-primary"}, "Submit")
    	)
    );
  }
});

var ItemsList = React.createClass({displayName: "ItemsList",
	render: function() {		  
		var itemsNodes = this.props.data.map(function (item) {
	      return (React.createElement(Item, null, item.text));
	    });
	    return (React.createElement("div", null, itemsNodes));
	}
});

var Item = React.createClass({displayName: "Item",
	render: function() {
	    return (React.createElement("div", null, this.props.children));
	}
});

React.render(React.createElement(ItemsOverview, {url: "/items"}), document.getElementById("content"));