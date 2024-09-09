@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Registered Users</h1>

    @if($nonAdminUsers->isEmpty())
        <p class="text-gray-500">No users found.</p>
    @else
        <div class="relative overflow-x-auto">

            @if(count($nonAdminUsers) >= 5)
                <!-- Pagination -->
                <div class="flex justify-between items-center mb-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Showing {{ $nonAdminUsers->firstItem() }} to {{ $nonAdminUsers->lastItem() }} of {{ $nonAdminUsers->total() }} users
                    </p>
                    <nav aria-label="Page navigation example">
                        {{ $nonAdminUsers->links('components.pagination.index') }}
                    </nav>
                </div>
            @endif

            <!-- Table -->
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 shadow mb-4">
                <thead class="text-xs text-gray-700 uppercase  bg-green-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center space-x-2">
                                <span class="text-lg">👤</span>
                                <span>Account</span>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center space-x-2">
                                <span class="text-lg">🎒</span>
                                <span>Child</span>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center space-x-2">
                                <span class="text-lg">🛡️</span>
                                <span>Guardian</span>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center space-x-2">
                                <span class="text-lg">🚨</span>
                                <span>Emergency Contact</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nonAdminUsers as $user)
                    <tr class="bg-white border-b hover:bg-gray-50 cursor-pointer">
                        <!-- Account Information -->
                        <td class="px-6 py-4  whitespace-nowra">
                            <p class="font-semibold text-gray-900">{{ $user->name }}</p>
                            <p>{{ $user->email }}</p>
                        </td>

                        <!-- Child Information -->
                        <td class="px-6 py-4">
                            <p>{{ $user->profile->child_name }}</p>
                            <p>{{ $user->profile->age }} {{ $user->profile->age == 1 ? 'year' : 'years' }} old ({{ ucfirst($user->profile->gender) }})</p>
                            <div>
                                <span class="text-sm mr-2">🏫</span>
                                <span>{{ $user->profile->school_name }}</span>
                            </div>
                            <div>
                                <span class="text-sm mr-2">🤍</span>
                                <span>{{ $user->profile->hobbies ?? 'N/A' }}</span>
                            </div>
                        </td>

                        <!-- Guardian Information -->
                        <td class="px-6 py-4">
                            <p>{{ $user->profile->guardian_name }}</p>
                            <p>{{ $user->profile->guardian_phone }}</p>
                            <p>{{ $user->profile->guardian_email }}</p>
                        </td>

                        <!-- Emergency Contact Information -->
                        <td class="px-6 py-4">
                            <p>{{ $user->profile->relationship }}</p>
                            <p>{{ $user->profile->emergency_contact_name }}</p>
                            <p>{{ $user->profile->emergency_phone }}</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="flex justify-between items-center">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Showing {{ $nonAdminUsers->firstItem() }} to {{ $nonAdminUsers->lastItem() }} of {{ $nonAdminUsers->total() }} users
                </p>
                <nav aria-label="Page navigation example">
                    {{ $nonAdminUsers->links('components.pagination.index') }}
                </nav>
            </div>
        </div>
    @endif
</div>
@endsection
