@extends('layouts.cheatsheets')

@section('content')
    <div class="max-w-4xl mx-auto px-8 py-10">
        <h1 class="text-4xl font-bold mb-6 text-orange-400">
            {{ $article->title }}
        </h1>

        @foreach($article->blocks as $block)
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
        @endforeach
    </div>
@endsection

