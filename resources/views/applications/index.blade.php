{{-- @props(['appl']) --}}
<x-baseblade>
    <style>
        th {
            padding: 10px
        }

        tr,
        td {
            padding: 5px;
        }
    </style>
    <div style="width: 100%" class="flex">
        @if ($appl->count()==0)
        <div style="margin-top: 100px">
            <b style="font-size: x-large;font-weight: bolder">No applications found. Add new application</b><a href="{{route("application.create")}}" style="font-size: x-large;font-weight: bolder">click here</a>
        </div>
        @else
            
        <table border="1" cellpadding="10" cellspacing="0" class=""
            style="width: 95%; border-collapse: collapse; font-family: Arial, sans-serif; margin-top: 20px;">
            <thead>
    
                <tr style="background-color: #e7cda7; color: #333;">
                    <th style="text-align: left;">S.No.</th>
                    <th style="text-align: left;">Name</th>
                    <th style="text-align: left;">Email</th>
                    <th style="text-align: left;">Position</th>
                    <th style="text-align: left;">Work Preference</th>
                    <th style="text-align: left;">Skills</th>
                    <th style="text-align: left;">Photo</th>
                    <th style="text-align: left;">Resume</th>
                    <th style="text-align: left;">Cover Letter</th>
                    <th style="text-align: left;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appl as $app)
                    <tr>
                        <td>{{$app->id}}</td>
                        <td>{{$app->name}}</td>
                        <td>{{$app->email}}</td>
                        <td>{{$app->position}}</td>
                        <td>{{$app->work_preference}}</td>
                        <td>
        @foreach(json_decode($app->skills) as $skill)
            <span style="display: inline-block; background-color: #e2e2e2; padding: 2px 5px; margin: 2px; border-radius: 3px;">
                {{ $skill }}
            </span>
        @endforeach
    </td>
                        <td>
                            <img src="applications/{{$app->photo}}"
                                style="width: 70px; height: 70px; object-fit: cover; border-radius: 5px;" />
                        </td>
                        <td>
                            <a href="applications/resumes/{{$app->resume}}"
                                style="color: green; text-decoration: underline;">View</a>
                        </td>
                        <td style="max-width: 250px;">{{$app->cover_letter}}</td>
                        <td>
                            <a href="application/{{$app->id}}/edit"><span class="material-symbols-outlined">
                                edit
                            </span></a>
                            {{-- <a href="application/{{$app->id}}/delete"><span class="material-symbols-outlined">
                                delete
                            </span></a> --}}
    
                            <form method="POST" style="display: inline" action="{{route("application.delete",$app->id)}}">
                                @csrf
                                @method("DELETE")
                                <button type="submit" style="display: inline-block;background-color: transparent;border: none;color: red;cursor: pointer"><span class="material-symbols-outlined">
                                delete
                            </span></button>
                            </form>
                        </td>
                    </tr>
                    <!-- Add more <tr> rows as needed -->
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

</x-baseblade>