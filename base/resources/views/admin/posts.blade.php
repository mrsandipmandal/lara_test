<x-layout.app-layout>

    <x-slot name="title">Post</x-slot>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Default form</h4>
                    <p class="card-description">
                        Basic form layout
                    </p>
                    <form class="forms-sample">
                        @csrf
                        <x-form.select name="exampleFormControlSelect1" label="Select" :options="$pst" valueKey="id" nameKey="title" class="form-control-lg"/>
                        <x-form.input type="email" name="nm" class="form-control" :options="['placeholder'=>'test']" value="" label="Name"/>
                        <x-form.button type="submit" name="submit" class="btn btn-primary me-2"/>
                        <x-form.button name="Cancel" class="btn btn-light"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Basic Table</h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Content.</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts->get() as $user)
                                    <tr>
                                        <td>{{ $user['title'] }}</td>
                                        <td>{{ $user['content'] }}</td>
                                        <td>{{ $user['created_at'] }}</td>
                                    </tr>
                                    @foreach ($user['comments'] as $ro)
                                        <tr>
                                            <td><code>Comments</code></td>
                                            <td>{{ $ro['content'] }}</td>
                                            <td>{{ $ro['created_at'] }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <x-slot name="scripts">
        @if (session()->has('_msg') && session()->has('_type'))
            <script>
                Swal.fire({
                    position: 'center',
                    icon: '{{ session('_type ') }}',
                    title: '{{ session('_msg ') }}',
                    showConfirmButton: false,
                    timer: 2500
                })
            </script>
        @endif
        <script>
            function get_vsubtyp() {
                var vtyp = document.getElementById('vtype').value;
                $.get("{{ url('/') }}/get_vsubtyp?vtyp=" + vtyp, function(data) {
                    $('#get_vsubtyp').html(data);
                });
            }
        </script>
    </x-slot>
</x-layout.app-layout>
