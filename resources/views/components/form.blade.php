<x-baseblade>
    <style>
        .form-control{
            width: 90%;
            padding: 10px;
        }
    </style>
    <div style="flex-direction: column;" class="flex">
        <h1 style="margin: 10px">APPLY NEW APPLICATION</h1>
        <div style="border: 2px solid #c4baaa;padding: 10px;min-width: 60%;">
        <form method="POST" action="{{route("application.store")}}"  enctype="multipart/form-data">
            @csrf
            <div style="padding: 5px;margin: 10px">
                <label style="font-weight: 500;font-size: larger" for="name">Full Name:</label><br>
                <input id="name" name="name" required placeholder="Full Name" class="form-control">
                @if($errors->has("name"))
                    <div style="color:red">{{$errors->first("name")}}</div>
                @endif
            </div>

            <div style="padding: 5px;margin: 10px">
                <label style="font-weight: 500;font-size: larger" for="email">Email Address:</label><br>
                <input id="email" name="email" type="email" required placeholder="Email" class="form-control">
                @if($errors->has("email"))
                    <div style="color:red">{{$errors->first("email")}}</div>
                @endif
            </div>

            <div style="padding: 5px;margin: 10px">
                <label style="font-weight: 500;font-size: larger" for="cover_letter">Cover Letter:</label><br>
                <textarea id="cover_letter" name="cover_letter" rows="6" required placeholder="Cover Letter"
                    class="form-control mb-2"></textarea>
                    @if($errors->has("cover_letter"))
                    <div style="color:red">{{$errors->first("cover_letter")}}</div>
                @endif
            </div>

            <div style="padding: 5px;margin: 10px">
                <h3 style="font-weight: 500">Desired Position:</h3>
                <select name="position" id="position" required style="padding: 5px;margin-top: 10px ">
                    <option value="">-- Select Position --</option>
                    <option value="frontend">Frontend Developer</option>
                    <option value="backend">Backend Developer</option>
                    <option value="fullstack">Full Stack Developer</option>
                    <option value="designer">UI/UX Designer</option>
                    <option value="devops">DevOps Engineer</option>
                </select>
                @if($errors->has("position"))
                    <div style="color:red">{{$errors->first("position")}}</div>
                @endif
            </div>


            <div style="padding: 5px;margin: 10px">
                <h3 style="font-weight: 500;margin-bottom: 10px">Work preference</h3>
                <div style="display: flex;flex-direction: column;gap: 5px">
                <label><input type="radio" name="work_preference" value="Remote" required> Remote</label>
                <label><input type="radio" name="work_preference" value="On-Site"> On-Site</label>
                <label><input type="radio" name="work_preference" value="Hybrid"> Hybrid</label>
                </div>
                @if($errors->has("work_preference"))
                    <div style="color:red">{{$errors->first("work_preference")}}</div>
                @endif
            </div>

            <div style="padding: 5px;display: flex;flex-direction: column;gap: 5px;margin: 10px">
                <h3 style="font-weight: 500;margin-bottom: 10px">Skills</h3>
                <label><input type="checkbox" name="skills[]" value="Laravel"> Laravel</label>
                <label><input type="checkbox" name="skills[]" value="React"> React</label>
                <label><input type="checkbox" name="skills[]" value="Vue"> Vue</label>
                <label><input type="checkbox" name="skills[]" value="Node.js"> Node.js</label>
                <label><input type="checkbox" name="skills[]" value="Python"> Python</label>
                <label><input type="checkbox" name="skills[]" value="Django"> Django</label>
                <label><input type="checkbox" name="skills[]" value="Flask"> Flask</label>
                <label><input type="checkbox" name="skills[]" value="MySQL"> MySQL</label>
                <label><input type="checkbox" name="skills[]" value="MongoDB"> MongoDB</label>
                @if($errors->has("skills[]"))
                    <div style="color:red">{{$errors->first("skills[]")}}</div>
                @endif
            </div>

            <div style="padding: 5px;margin: 10px">
                <h3 style="font-weight: 500;margin-bottom: 10px">Upload Photo</h3>
                <input id="photo" type="file" name="photo" accept="image/*" required>
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