@extends('backend.layouts.backend')

@section('title', 'Skills')

@section('main-content')
<div class="row">
    <div class="col-12">
        <h4 class="py-3 mb-4">Skills</h4>

        <div class="card">
            <div class="card-body skills-form">
                <div class="error_msg row"></div>
                <form method="POST" id="skillsSubmit">
                    @csrf
                    {{-- Skills Title --}}
                    <div class="mb-3">
                        <label class="form-label" for="name">Skill Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" name="name" placeholder="Skill name"
                            value="" />
                    </div>
                    {{-- Skills Description --}}
                    <div class="mb-3">
                        <label class="form-label" for="percentage">Skill Percentage <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" name="percentage"
                            placeholder="Skill percentage" value="" />
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Percentage</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($skills as $skill)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$skill->name}}</td>
                                <td>{{$skill->percentage}}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $(document).on('submit', 'form#skillsSubmit', function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            ajaxStoreAndUpdate("POST", "{{route('backend.dashboard.skill.store')}}", formData, ".skills-form", "form#skillsSubmit", "Skills Added Successfully");
            $('.table-responsive').load(location.href+' .table');
        });
    });
</script>
@endpush