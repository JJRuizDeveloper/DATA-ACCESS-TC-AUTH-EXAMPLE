<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:p-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        {{ __('Create New Todo') }}
                    </h3>
                    <form action="{{ route('store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Enter todo title" required />
                        </div>
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 mt-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">
                                Create Todo
                            </button>
                        </div>
                    </form>
                </div>

                <div class="border-t border-gray-200">
                    <div class="bg-gray-50 px-4 py-5 sm:px-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Your Todos</h3>
                    </div>
                    <ul class="divide-y divide-gray-200">
                        @forelse (Auth::user()->todos as $todo)
                            <li class="px-4 py-4 sm:px-6 hover:bg-gray-50 transition duration-150 ease-in-out">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-indigo-600 truncate">
                                        {{ $todo->title }}
                                    </p>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <form method="POST" action="{{ route('destroy', $todo->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" value="Delete"  style="cursor: pointer;"/>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="px-4 py-4 sm:px-6 text-gray-500 text-center">
                                No todos yet. Create one above!
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>