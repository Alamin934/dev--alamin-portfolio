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
                    <input type="hidden" name="id">
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
                                <td class="d-flex">
                                    <a href="#skillsSubmit" type="button" data-id="{{$skill->id}}"
                                        class="btn btn-primary btn-sm edit-skill me-2">Edit</a>
                                    <form method="post"
                                        action="{{route('backend.dashboard.skill.destroy', $skill->id)}}">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
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
        // Add and update skill
        $(document).on('submit', 'form#skillsSubmit', function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            ajaxStoreAndUpdate("POST", "{{route('backend.dashboard.skill.store')}}", formData, ".skills-form", "form#skillsSubmit", "Skills Added or Updated Successfully");
            $('.table-responsive').load(location.href+' .table');
        });

        // Edit Skill and Get Data
        $(document).on('click', '.edit-skill', function(e){
            // e.preventDefault();
            let skill_id = $(this).data('id');
            $.get(
                `/backend/dashboard/skill/${skill_id}/edit`, 
                function (response) {
                    if(response.status == 'success'){
                        $('input[name="id"]').val(response.data.id);
                        $('input[name="name"]').val(response.data.name);
                        $('input[name="percentage"]').val(response.data.percentage);
                        toastr.info("Skill get and set successfully");
                    }
                }
            );
        });
        // Edit Skill and Get Data
        // $(document).on('submit', '#deleteSkill', function(e){
        //     e.preventDefault();
        //     let skill_id = $("input#delId").val();
        //     alert(skill_id)
        //     $.post(
        //         `/backend/dashboard/skill/${skill_id}`, 
        //         function (response) {
        //             console.log(response);
        //             if(response.status == 'success'){
        //                 $('.table-responsive').load(location.href+' .table');
        //                 toastr.info("Skill Deleted successfully");
        //             }
        //         }
        //     );
        // })

    });
</script>
@endpush