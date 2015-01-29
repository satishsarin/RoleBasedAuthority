	{{Form::label('title', 'Name:')}}
	{{Form::text('title', $article->name)}}

	{{Form::label('body', 'Content:')}}
	{{Form::text('body', $article->body)}}

	{{Form::submit()}}