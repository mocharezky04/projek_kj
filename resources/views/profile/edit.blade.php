<x-app-layout>
    <x-slot name="header">
        <div class="section-title">
            <h2 class="page-title fs-2 mb-0">{{ __('Profil Pengguna') }}</h2>
        </div>
    </x-slot>

    <div class="profile-shell d-grid gap-4">
        <div class="profile-card p-4 p-md-5">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="profile-card p-4 p-md-5">
            @include('profile.partials.update-password-form')
        </div>

        <div class="profile-card p-4 p-md-5">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>
