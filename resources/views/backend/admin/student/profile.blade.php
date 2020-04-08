@php
    print_r();
@endphp
<div class="text-center">
    <img src="http://wattleparkkgn.sa.edu.au/wp-content/uploads/2017/06/placeholder-profile-sq.jpg" alt="" height="150" width="150">
</div>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <table class="table table-centered mb-0">
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>{{ $student_details->user->name }}</td>
                </tr>
                <tr>
                    <td>Class</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Section</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Parent</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
