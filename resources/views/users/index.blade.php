@php
    $cuser = auth()->user();
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('lumki::ui.manage_users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="space-y-10">
                    <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                        <table class="table-auto">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Role') }}</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr class="{{ $cuser->id === $user->id ? 'text-red-700' : '' }}">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->getRoleNames()->join(", ") }}</td>
                                    <td>
                                        <button class="cursor-pointer text-sm text-blue-500 focus:outline-none">
                                            <a href="{{ route('lumki.users.edit', $user) }}">{{ __('lumki::ui.edit_roles') }}</a>
                                        </button>
                                        <button class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none">
                                            <a href="{{ route('impersonate', $user->id) }}">{{ __('lumki::ui.impersonate') }}</a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
