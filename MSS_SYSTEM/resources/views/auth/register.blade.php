<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" style="text-align:center;">
                <img src="https://img.icons8.com/fluency/512/create-new.png" alt="" style="width: 100px;">
            </a>
        </x-slot>

        <form method="POST" action="{{ route('hr_new_user_create') }}">
            @csrf
            <!-- Name -->
            <div>
                <lable for="name">Name</lable>
                <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- phon number -->
            <div class="mt-4">
                <lable for="Phone" >Phone Number<lable/>
                <input id="Phone Number"  class="block mt-1 w-full" type="text" name="Phone" :value="old('Phone')" required />
                <x-input-error :messages="$errors->get('Phone')" class="mt-2" />
            </div>
            <!--address-->

              <!-- Address-->
            <div class="mt-4">
                <lable for="address">Address</lable>
                <input id="address"  class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />

            </div>
            <!--address-->


            <!-- Address-->
            <div class="mt-4">
                <lable for="Possition">Possition<lable/>
                <select name="position" class="block mt-1 w-full">
                    <option value="superviser">supervisor</option>
                    <option value="finanace">finanace manager</option>
                    <option value="purchasing">purchasing manager</option>
                    <option value="factory">factory manager</option>
                    <option value="toplevel">top level manager</option>
                </select>
                <x-input-error :messages="$errors->get('position')" class="mt-2" />

            </div>
            <!--address-->

            <div class="mt-4">
                <lable for="Access Levels">Access Levels<lable/>
                <hr/><br/>

                <table  class="block mt-1 w-full">
                    <thead class="block mt-1 w-full">
                        <tr>
                            <th style="width: 80px;">
                                <lable for="Access" :value="__('HR')"  />
                                <input class="" type="checkbox" name="supervisor">
                            </th>
                            <th style="width: 80px;">
                                <lable for="Access" :value="__('Finanace')"  />
                                <input class="" type="checkbox" name="Finanace_Module">
                            </th>

                            <th style="width: 80px;">
                                <lable for="purchasing" :value="__('purchasing')"  />
                                <input class="" type="checkbox" name="purchasingModule">
                            </th>

                            <th style="width: 80px;">
                                <lable for="factory" :value="__('factory')"  />
                                <input class="" type="checkbox" name="factoryModule">
                            </th>

                            <th style="width: 80px;"> 
                                <lable for="Reports" :value="__('Reports')"  />
                                <input class="" type="checkbox" name="Reports">
                            </th>
                        </tr>

                    </thead>
                </table>


            </div>




            <!-- Email Address -->
            <div class="mt-4">
                <lable for="email">Email<lable/>
                <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!--address-->
            
            <!-- Password -->
            <div class="mt-4">
                <lable for="password">Password<lable/>

                <input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
               <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <lable for="password Confirm">Password Confirm<lable/>
                <input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('create now') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
