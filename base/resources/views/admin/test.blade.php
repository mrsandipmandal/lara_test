<x-layout.app-layout>
    <x-slot name="title">Testing Components</x-slot>

    <form class="forms-sample">
        @csrf
        <x-form.select name="select" label="Testing" :options="[['id' => 1, 'title' => 'Option 1'],['id' => 2, 'title' => 'Option 2'],['id' => 3, 'title' => 'Option 3']]" valueKey="id" nameKey="title" class="form-control-lg"/>
        <x-form.input type="text" name="nm" class="form-control" :options="['placeholder'=>'Password']" value="" label="Name"/>
        <x-form.button type="submit" name="submit" class="btn btn-primary me-2"/>
        <x-form.button name="Cancel" class="btn btn-light"/>
    </form>

    <x-slot name="scripts">

    </x-slot>
</x-layout.app-layout>
