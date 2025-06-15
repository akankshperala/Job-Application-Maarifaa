<x-baseblade>
    <style>
        .form-control{
            width: 90%;
            padding: 10px;
        }
    </style>
    <div style="flex-direction: column;" class="flex">
        <h1 style="margin: 10px">EDIT APPLICATION - {{$application->name}}</h1>
        <div style="border: 2px solid #c4baaa;padding: 10px;min-width: 60%;">
        <form method="POST" action="{{route("application.update",$application->id)}}"  enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div style="padding: 5px;margin: 10px">
                <label style="font-weight: 500;font-size: larger" for="name">Full Name:</label><br>
                <input id="name" name="name" required placeholder="Full Name" class="form-control" value="{{$application->name}}">
                @if($errors->has("name"))
                    <div style="color:red">{{$errors->first("name")}}</div>
                @endif
            </div>

            <div style="padding: 5px;margin: 10px">
                <label style="font-weight: 500;font-size: larger" for="email">Email Address:</label><br>
                <input id="email" name="email" type="email" required placeholder="Email" class="form-control" value="{{$application->email}}">
                @if($errors->has("email"))
                    <div style="color:red">{{$errors->first("email")}}</div>
                @endif
            </div>

            <div style="padding: 5px;margin: 10px">
                <label style="font-weight: 500;font-size: larger" for="cover_letter">Cover Letter:</label><br>
                <textarea id="cover_letter" name="cover_letter" rows="6" required placeholder="Cover Letter"
                    class="form-control mb-2">{{$application->cover_letter}}</textarea>
                    @if($errors->has("cover_letter"))
                    <div style="color:red">{{$errors->first("cover_letter")}}</div>
                @endif
            </div>

            <div style="padding: 5px;margin: 10px">
                <h3 style="font-weight: 500">Desired Position:</h3>
                <select name="position" id="position" required style="padding: 5px;margin-top: 10px">
                    <option value="">-- Select Position --</option>
                    <option value="frontend" {{ $application->position == 'frontend' ? 'selected' : '' }}>Frontend Developer</option>
                    <option value="backend" {{ $application->position == 'backend' ? 'selected' : '' }}>Backend Developer</option>
                    <option value="fullstack" {{ $application->position == 'fullstack' ? 'selected' : '' }}>Full Stack Developer</option>
                    <option value="designer" {{ $application->position == 'designer' ? 'selected' : '' }}>UI/UX Designer</option>
                    <option value="devops" {{ $application->position == 'devops' ? 'selected' : '' }}>DevOps Engineer</option>
                </select>

                @if($errors->has("position"))
                    <div style="color:red">{{$errors->first("position")}}</div>
                @endif
            </div>


            <div style="padding: 5px;margin: 10px">
                <h3 style="font-weight: 500;margin-bottom: 10px">Work preference</h3>
                <div style="display: flex;flex-direction: column;gap: 5px">
                <label><input type="radio" name="work_preference" value="Remote" 
        {{ $application->work_preference == 'Remote' ? 'checked' : '' }} required> Remote</label>
                <label><input type="radio" name="work_preference" value="On-Site"
        {{ $application->work_preference == "On-Site" ? 'checked' : '' }}> On-Site</label>
                <label><input type="radio" name="work_preference" value="Hybrid" 
        {{ $application->work_preference == 'Hybrid' ? 'checked' : '' }}> Hybrid</label>
                </div>
                @if($errors->has("work_preference"))
                    <div style="color:red">{{$errors->first("work_preference")}}</div>
                @endif
            </div>

           @php
                $selectedSkills = is_array($application->skills) ? $application->skills : json_decode($application->skills, true);
            @endphp

            <div style="padding: 5px; display: flex; flex-direction: column; gap: 5px; margin: 10px">
                <h3 style="font-weight: 500; margin-bottom: 10px">Skills</h3>

                <label><input type="checkbox" name="skills[]" value="Laravel" {{ in_array("Laravel", $selectedSkills ?? []) ? 'checked' : '' }}> Laravel</label>
                <label><input type="checkbox" name="skills[]" value="React" {{ in_array("React", $selectedSkills ?? []) ? 'checked' : '' }}> React</label>
                <label><input type="checkbox" name="skills[]" value="Vue" {{ in_array("Vue", $selectedSkills ?? []) ? 'checked' : '' }}> Vue</label>
                <label><input type="checkbox" name="skills[]" value="Node.js" {{ in_array("Node.js", $selectedSkills ?? []) ? 'checked' : '' }}> Node.js</label>
                <label><input type="checkbox" name="skills[]" value="Python" {{ in_array("Python", $selectedSkills ?? []) ? 'checked' : '' }}> Python</label>
                <label><input type="checkbox" name="skills[]" value="Django" {{ in_array("Django", $selectedSkills ?? []) ? 'checked' : '' }}> Django</label>
                <label><input type="checkbox" name="skills[]" value="Flask" {{ in_array("Flask", $selectedSkills ?? []) ? 'checked' : '' }}> Flask</label>
                <label><input type="checkbox" name="skills[]" value="MySQL" {{ in_array("MySQL", $selectedSkills ?? []) ? 'checked' : '' }}> MySQL</label>
                <label><input type="checkbox" name="skills[]" value="MongoDB" {{ in_array("MongoDB", $selectedSkills ?? []) ? 'checked' : '' }}> MongoDB</label>

                @if($errors->has("skills[]"))
                    <div style="color:red">{{ $errors->first("skills[]") }}</div>
                @endif
            </div>


            <div style="padding: 5px;margin: 10px">
                <h3 style="font-weight: 500;margin-bottom: 10px">Upload Photo</h3>
                <input id="photo" type="file" src="applications/{{$application->photo}}" name="photo" accept="image/*" required>
                @if($errors->has("photo"))
                    <div style="color:red">{{$errors->first("photo")}}</div>
                @endif
            </div>

            <div style="padding: 5px;margin: 10px">
                <h3 style="font-weight: 500;margin-bottom: 10px">Upload Resume (PDF):</h3>
                <input id="resume" type="file" name="resume" accept="application/pdf" required>
                @if($errors->has("resume"))
                    <div style="color:red">{{$errors->first("resume")}}</div>
                @endif
            </div>

            <div style="padding: 5px;margin: 10px" class="flex">
                <button style="padding: 8px;background-color:rgb(67, 147, 212); color: rgb(0, 0, 0);width: 200px;" type="submit">Apply</button>
            </div>
        </form>
        </div>
    </div>
</x-baseblade>