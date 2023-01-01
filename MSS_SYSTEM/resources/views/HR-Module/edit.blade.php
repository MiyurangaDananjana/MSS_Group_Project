
@extends('comman.main') @section('edidUser')
<x-guest-layout>
    <x-auth-card>
      
        @if($msg!="not-set")
                <div class="row">
                    <div class="alert-success btn-block p-3 text-center">
                        {{$msg}}
                    </div>
                </div>
        <br/> 
        @endif
        <x-slot name="logo">
            <a href="/" style="text-align:center;">
                <img src="https://img.icons8.com/fluency/512/create-new.png" alt="" style="width: 100px;">
            </a>
        </x-slot>



        <form method="GET" action="{{ route('hr_new_user_edit') }}">
            @csrf
            <!-- Name -->
            <input  type="hidden" name="userId" value="{{$users->id}}"/>

            <div>
                <lable for="name">Name</lable>
                <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$users->name}}" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- phon number -->
            <div class="mt-4">
                <lable for="Phone" >Phone Number<lable/>
                <input id="Phone Number"  class="block mt-1 w-full" type="text" name="Phone" value="{{$users->Phone}}" required />
                <x-input-error :messages="$errors->get('Phone')" class="mt-2" />
            </div>
            <!--address-->

              <!-- Address-->
            <div class="mt-4">
                <lable for="address">Address</lable>
                <input id="address"  class="block mt-1 w-full" type="text" name="address" value="{{$users->Address}}" required />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
            <!--address-->


            <!-- Address-->
            <div class="mt-4">
                <lable for="Possition">Possition<lable/>
                <select name="position" class="block mt-1 w-full">
                    <option value="superviser" {{$users->Position=="superviser" ? 'selected' : ""}}>supervisor</option>
                    <option value="HR" {{$users->Position=="HR" ? 'selected' : ""}}> Human Resource Manager</option>
                    <option value="finanace" {{$users->Position=="finanace" ? 'selected' : ""}}> finanace manager</option>
                    <option value="purchasing" {{$users->Position=="purchasing" ? 'selected' : ""}}>purchasing manager</option>
                    <option value="factory" {{$users->Position=="factory" ? 'selected' : ""}}>factory manager</option>
                    <option value="toplevel" {{$users->Position=="toplevel" ? 'selected' : ""}}>top level manager</option>
                </select>
                <x-input-error :messages="$errors->get('position')" class="mt-2" />

            </div>
            <!--address-->

            <div class="mt-4">
                <lable for="Access Levels">Access Levels<lable/>
                <hr/><br/>

                <table  class="block mt-1 w-full">
                    <thead class="block mt-1 w-full">
                        <tr class="align-center" style="text-align:center;">
                            
                            <th style="width: 80px;">
                                
                                <lable for="Access" :value="__('Finanace')">Finanace<lable/>
                                <br/>
                                <input class="" type="checkbox"  {{$usersAccesslevels->Finanace_Module == 1 ? 'checked' : '' }}  name="Finanace_Module">
                            </th>

                            <th style="width: 80px;">
                                
                                <lable for="Access" :value="__('purchasing')">purchasing<lable/>
                                <br/>
                                <input class="" type="checkbox" {{$usersAccesslevels->purchasingModule==1 ? 'checked' : '' }} name="purchasingModule">
                            </th>

                            <th style="width: 80px;">
                                <lable for="Access" :value="__('Factory')">Factory<lable/>
                                <br/>
                                <input class="" type="checkbox" {{$usersAccesslevels->factoryModule==1 ? 'checked' : '' }} name="factoryModule">
                            </th>

                            <th style="width: 80px;"> 
                                <lable for="Access" :value="__('Report')">Report<lable/>
                                <br/>
                                <input class="" type="checkbox" {{$usersAccesslevels->Reports==1 ? 'checked' : '' }} name="Reports">
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                <lable for="email">Email<lable/>
                <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$users->email}}"" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!--address-->
            
           

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Edit Now') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@endsection('edidUser')