@extends('layouts.main')
@section('main_content')
    <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <ul role="list" class="divide-y divide-gray-200">
            @foreach($posts as $post)
            <li>
                <a href="{{ route('admin.post.edit', ['post' => $post]) }}" class="block hover:bg-gray-50">
                    <div class="flex items-center px-4 py-4 sm:px-6">
                        <div class="min-w-0 flex-1 flex items-center">
{{--                            <div class="flex-shrink-0">--}}
{{--                                <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">--}}
{{--                            </div>--}}
                            <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                <div>
                                    <p class="text-sm font-medium text-indigo-600 truncate">{{ $post->user->name }}</p>
                                    <p class="mt-2 flex items-center text-sm text-gray-500">
                                        <!-- Heroicon name: solid/mail -->
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                        </svg>
                                        <span class="truncate">{{ $post->user->email }}</span>
                                    </p>
                                </div>
                                <div class="hidden md:block">
                                    <div>
                                        <p class="text-sm text-gray-900">
                                            T???o l??c
                                            <time datetime="2020-01-07">{{ $post->created_at->format('d/m/Y H:i:s') }}</time>
                                        </p>
                                        <p class="mt-2 flex items-center bold text-gray-500">
                                            {{ $post->title }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <!-- Heroicon name: solid/chevron-right -->
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
@endsection
