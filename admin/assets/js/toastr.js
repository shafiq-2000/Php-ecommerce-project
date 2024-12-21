
        toastr.options = {
            closeButton: true,
            positionClass: "toast-top-center",
            showDuration: "300", // ফেইড ইন হওয়ার সময় (মিলিসেকেন্ডে)
            hideDuration: "1000", // ফেইড আউট হওয়ার সময় (মিলিসেকেন্ডে)
            timeOut: "4000", // টোস্ট প্রদর্শনের সময় (মিলিসেকেন্ডে)
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn", // ফেইড ইন ইফেক্ট
            hideMethod: "fadeOut" // ফেইড আউট ইফেক্ট
        };


        //====================category====================
        if (localStorage.getItem('delete_msg')) {
            toastr.success('Data deleted successfully');
            localStorage.removeItem('delete_msg');
        }

        //category show
        if (localStorage.getItem('update_msg')) {
            toastr.success('Data update successfully');
            localStorage.removeItem('update_msg');
        }
        //category insert
        if (localStorage.getItem('cat_insert')) {
            toastr.success('Data insert success');
            localStorage.removeItem('cat_insert');
        }

//=====================product==========================
        //product insert
        if (localStorage.getItem('data_insert')) {
            toastr.success('Data insert success');
            localStorage.removeItem('data_insert');
        }
//=====================user reset password==========================
   
        if (localStorage.getItem('p_reset_mail')) {
            toastr.success('Please check your email and create a new Password.');
            localStorage.removeItem('p_reset_mail');
        }
   
        if (localStorage.getItem('reset_pass')) {
            toastr.success('Password update success.Now you can login with new password.');
            localStorage.removeItem('reset_pass');
        }
   
        if (localStorage.getItem('forget_pass')) {
            toastr.success('Password update success.Now you can login with new password.');
            localStorage.removeItem('forget_pass');
        }
