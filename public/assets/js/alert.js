        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('.delete-button');
    
        // Attach an event listener to each delete button
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        // Here you can add additional code to handle the deletion
                    }
                });
            });
        });