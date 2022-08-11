<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<style>
.btn-primary {
--bs-btn-color: #0e2e4e;
--bs-btn-bg: #0d6efd;
--bs-btn-border-color: #0d6efd;
--bs-btn-hover-color: #fff;
--bs-btn-hover-bg: #0b5ed7;
--bs-btn-hover-border-color: #0a58ca;
--bs-btn-focus-shadow-rgb: 49,132,253;
--bs-btn-active-color: #fff;
--bs-btn-active-bg: #0a58ca;
--bs-btn-active-border-color: #0a53be;
--bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
--bs-btn-disabled-color: #fff;
--bs-btn-disabled-bg: #0d6efd;
--bs-btn-disabled-border-color: #0d6efd;
}</style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Welcome to User!
                    
                    <div class="center">
                        
                        <div class="cotainer">
                               <div>
                                    <h2>Short your link!</h2>
                                    <form action="{{route('short.url')}}" method="post">
                                        @csrf
                                        <input type="url" name="original_url" id="1" required>
                                        <button  type="submit" class="btn btn-primary">short it!</button>
                                    </form>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



