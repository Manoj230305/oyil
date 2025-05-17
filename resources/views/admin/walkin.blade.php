@include('admin.headers.top')
@include('admin.headers.sidebar')
<style>
    .alert {
        padding: 15px;
        margin: 10px 0;
        border-radius: 5px;
    }

    .alert-success {
        background-color: #4caf50;
        color: white;
        text-align: center;
    }

    .alert-error {
        background-color: #f44336;
        color: white;
        text-align: center;
    }
</style>


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<main>
            <div class="head-title" style="visibility:hidden">
                <div class="left">
                    <h1>Tours</h1>
                   
                </div>
            </div>
            <style>
                .table-data{
                    display: flex;
                    justify-content: center;
                }
                </style>
            <div class="table-data">
    <div class="category-form">
        <h2>Add Walkin</h2>
        <form action="{{ route('walkin.store') }} " method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Name" required>
            </div>
        
            <!-- Phone Number -->
            <div class="form-group">
                <label for="phone-number">Phone Number</label>
                <input type="number" id="phone-number" name="phone-number" placeholder="Enter Phone Number" required>
            </div>
        
            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter Email" required>
            </div>
                <input type="hidden"  name="message" value="Walk-In">
            
            <!-- Add Option Button -->
            <div class="row btn-row">
                <button type="submit" class="btn-submit btn-main">Add Walkin</button>
            </div>
        </form>
    </div>
</div>

        </main>
@include('admin.footers.dependency')
	