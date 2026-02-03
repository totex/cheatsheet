@extends('layouts.cheatsheets')

@section('content')
    <div class="max-w-4xl mx-auto px-8 py-10">
        <h1 class="text-4xl font-bold mb-6 text-orange-400">
            {{ $article->title }}
        </h1>

        <h2 class="text-1xl font-bold mb-6 text-slate-400">
            {{ $article->sub_title }}
        </h2>

        @foreach($article->content as $block)
            <article class="mb-10">
                <h2 class="text-2xl font-semibold mb-3 text-slate-400">
                    {{ $block['content_title'] ?? 'No Title' }}
                </h2>
                <div class="bg-slate-900 border border-slate-800 rounded-lg p-4 font-mono text-lg text-green-400">
                    {!! Str::markdown($block['content_body']) !!}
                    {{-- {!! str($block['content_body'] ?? 'No content available')->markdown()->sanitizeHtml() !!} --}}
                </div>
            </article>
        @endforeach

        {{-- <section class="mb-10">
            <div class="bg-slate-900 border border-slate-800 rounded-lg p-4 font-mono text-md">
                
                {{ $article->content_title ?? 'no content available' }}
                {{ $article->content_body ?? 'no content available' }}

                {!! str($article->content)->markdown()->sanitizeHtml() !!}

                {!! Str::markdown($article->content ?? 'no content available',
                [
                    'renderer' => [
                        'soft_break' => "<br/ >\n",
                    ],
                ]) !!}
            </div>
        </section> --}}

        {{-- @foreach($article->blocks as $block)
            <section class="mb-10">
                <h2 class="text-2xl font-semibold mb-3">
                    {{ $block->title }}
                </h2>

                @if($block->type === 'text')
                    <p class="text-slate-300 leading-relaxed">
                        {{ $block->content }}
                    </p>
                @elseif($block->type === 'code')
                    <div class="bg-slate-900 border border-slate-800 rounded-lg p-4 font-mono text-sm">
                        {!! nl2br(e($block->content)) !!}
                    </div>
                @endif
            </section>
        @endforeach --}}
    </div>
@endsection

