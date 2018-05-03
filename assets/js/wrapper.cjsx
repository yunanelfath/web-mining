React = require('react')
ReactDOM = require('react-dom')
{ Component } = React
$ = require('jquery')

class Content extends Component
	constructor: (props) ->
    super(props)
		@state = {
			stemming: ''
			tokenizr: ''
		}

	onSubmitForm: (event) ->
		k = 0
		form = {}
		while k < event.target.elements.length
			if event.target.elements[k].type == 'textarea'
				form[event.target.elements[k].name] = event.target.elements[k].value
			k++
		console.log form
		_this = @
		$.ajax(
			url: event.target.action
			type: 'get'
			data: form
		).done((e) ->
			debugger
		)
		event.preventDefault()

	render: ->
		<div className="main-container container-form">
      <h1>text processing</h1>
			<form onSubmit={@onSubmitForm} action="tokenizr/index.php?id=test">
				<textarea name="textp"></textarea>
				<br/>
				<input type="submit"/>
			</form>
			<div style={width: '100px'}>
				{@state?.stemming}
			</div>
			<div style={width: '100px'}>
				{@state?.tokenizr}
			</div>
		</div>

module.exports = Content
