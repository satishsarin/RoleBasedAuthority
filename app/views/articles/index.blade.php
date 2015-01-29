<html>
	<body>
		<h1>Aritcles List</h1>

		{{link_to('/articles/create', 'New Article')}}
		<table border="1">
			<tr>
				<th>S.No</th>
				<th>Title</th>
				<th>content</th>
				<th colspan="2">Functions</th>
			</tr>
			<?php $count = 0; ?>
			@foreach($articles as $article)
				<?php $count++; ?>
				<tr>
					<td>{{$count}}</td>
					<td>{{ $article->title }}</td>
					<td>{{ $article->body }}</td>
					<td>{{ link_to("/articles/{$article-> id}/edit", "Edit") }}</td>
					<td>
						 	{{ Form::open(array('route' => array('articles.destroy', $article->id), 'method' => 'delete')) }}
      					<button type="submit" >Delete</button>
  					 	{{ Form::close() }}
					</td>
				</tr>
			@endforeach	

		</table>
	</body>
</html>