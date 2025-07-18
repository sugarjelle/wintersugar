<section class="bg-white shadow-sm rounded-lg p-6">
    <header>
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Profile Information') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    {{ __("View and manage your account's profile information.") }}
                </p>
            </div>
            <button type="button" onclick="toggleEdit()" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                {{ __('Edit Profile') }}
            </button>
        </div>
    </header>

    <!-- Profile Display (Non-Editable) -->
    <div id="profileDisplay" class="mt-6 space-y-4">
        <!-- Profile Picture Display -->
        <div class="flex items-center space-x-4">
            <img src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=0D8ABC&color=fff' }}" 
                 alt="Profile Photo" 
                 class="w-20 h-20 rounded-full object-cover border">
            <div>
                <span class="text-sm text-gray-600">Profile Photo</span>
            </div>
        </div>

        <div>
            <p class="text-sm text-gray-500">{{ __('Name') }}</p>
            <p class="text-gray-900">{{ $user->name }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">{{ __('Email') }}</p>
            <p class="text-gray-900">{{ $user->email }}</p>
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <p class="text-sm text-yellow-600 mt-1">
                    {{ __('Your email address is unverified.') }}
                </p>
            @endif
        </div>

        @if($user->phone)
        <div>
            <p class="text-sm text-gray-500">{{ __('Phone') }}</p>
            <p class="text-gray-900">{{ $user->phone }}</p>
        </div>
        @endif

        @if($user->address)
        <div>
            <p class="text-sm text-gray-500">{{ __('Address') }}</p>
            <p class="text-gray-900">{{ $user->address }}</p>
        </div>
        @endif

        @if($user->bio)
        <div>
            <p class="text-sm text-gray-500">{{ __('Bio') }}</p>
            <p class="text-gray-900">{{ $user->bio }}</p>
        </div>
        @endif
    </div>

    <!-- Edit Form (Initially Hidden) -->
    <form id="profileEditForm" method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 hidden" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="flex items-center space-x-4">
            <img id="profilePhotoPreview" src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=0D8ABC&color=fff' }}" 
                 alt="Profile Photo Preview" 
                 class="w-20 h-20 rounded-full object-cover border">
            <div>
                <x-input-label for="profile_photo" :value="__('Change Photo')" />
                <input id="profile_photo" name="profile_photo" type="file" class="mt-1 block w-full text-sm text-gray-600" accept="image/*" 
                       onchange="previewImage(this)" />
                <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
            </div>
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save Changes') }}</x-primary-button>
            <button type="button" onclick="toggleEdit()" class="text-sm text-gray-600 hover:text-gray-900">
                {{ __('Cancel') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
</section>

<script>
    function toggleEdit() {
        const displaySection = document.getElementById('profileDisplay');
        const editForm = document.getElementById('profileEditForm');
        const editBtn = document.querySelector('[onclick="toggleEdit()"]');
        
        if (displaySection.classList.contains('hidden')) {
            displaySection.classList.remove('hidden');
            editForm.classList.add('hidden');
            editBtn.textContent = '{{ __("Edit Profile") }}';
        } else {
            displaySection.classList.add('hidden');
            editForm.classList.remove('hidden');
            editBtn.textContent = '{{ __("View Profile") }}';
        }
    }

    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePhotoPreview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>