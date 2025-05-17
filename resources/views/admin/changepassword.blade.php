@include('admin.headers.top')
@include('admin.headers.sidebar')
    <main>
			<div class="head-title" style="visibility:hidden">
				<div class="left">
					<h1>Settings</h1>
				</div>
			</div>


			<div class="table-data">
                <div class="change-password">
                    <div class="head">
                        <h3>Change Password</h3>
                    </div>
                    <div class="password-form">
                         <form id="passwordChangeForm">
                            @csrf
                            <div class="password-form">
                                <label for="old-password">Old Password</label>
                                <input type="password" id="old-password" name="old_password" placeholder="Enter old password" required>

                                <label for="new-password">New Password</label>
                                <input type="password" id="new-password" name="new_password" placeholder="Enter new password" required>

                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm new password" required>

                                <button type="submit" class="save-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <style>
                .change-password {
                    background: #fff;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    width: 100%;
                    max-width: 400px;
                    margin: auto;
                }
                
                .password-form {
                    display: flex;
                    flex-direction: column;
                    gap: 10px;
                }
            
                .password-form label {
                    font-weight: bold;
                    margin-top: 5px;
                }
            
                .password-form input {
                    width: 100%;
                    padding: 8px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }
            
                .save-btn {
                    background: #007bff;
                    color: white;
                    border: none;
                    padding: 8px 15px;
                    border-radius: 5px;
                    cursor: pointer;
                    width: fit-content;
                    margin-top: 10px;
                }
            
                .save-btn:hover {
                    background: #3a3a9c;
                }
            </style>
            
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

<script>
document.getElementById('passwordChangeForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let oldPassword = document.getElementById('old-password').value;
    let newPassword = document.getElementById('new-password').value;
    let confirmPassword = document.getElementById('confirm-password').value;
    let csrfToken = document.querySelector('input[name="_token"]').value;
    
    // Client-side validation
    if (newPassword !== confirmPassword) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'New password and confirm password must match.',
        });
        return;
    }

    // AJAX request to change the password
    let formData = new FormData();
    formData.append('old_password', oldPassword);
    formData.append('new_password', newPassword);
    formData.append('confirm_password', confirmPassword);
    
    fetch('{{ route('admin.password.change') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: data.message || 'Password successfully updated.',
            }).then(() => {
                // Optionally redirect after a successful password change
                window.location.href = '{{ route('admin') }}'; // Redirect to the admin dashboard or any page
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message || 'An error occurred while changing the password.',
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'An error occurred while changing the password.',
        });
    });
});
</script>
@include('admin.footers.dependency')
	