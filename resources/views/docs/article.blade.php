<div>
    @foreach($sections as $section)
        <div>
            <h3>{{ $section->title }}</h3>
            <ul>
                @foreach($section->articles as $article)
                    <li>{{ $article->title }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
