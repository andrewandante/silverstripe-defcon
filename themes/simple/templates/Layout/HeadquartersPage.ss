<% if $CheckSuites %>
	<% loop $CheckSuites %>
		<h1>$Title</h1>
		<% loop $Table %>
			<% loop $Children %>
				$Title
				$AWSAccount.Title
			<% end_loop %>
		<% end_loop %>
				<% loop $Checks %>
					<h3>$Title</h3>
					$doCheck
				<% end_loop %>
					$Value
	<% end_loop %>
<% end_if %>
