
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.js')}}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>

  <script type="text/javascript">
    function updateSubcategories(categoryId) {
        let subcategoryDropdown = $('#subcategory');
        subcategoryDropdown.empty(); // Clear previous options
        subcategoryDropdown.append('<option value="">Select Subcategory</option>'); // Default option

        if (categoryId) {
            $.ajax({
                url: '/get-subcategories/' + categoryId,
                type: 'GET',
                success: function(data) {
                    if (data.length > 0) {
                        data.forEach(function(subcategory) {
                            subcategoryDropdown.append(
                                '<option value="' + subcategory.id + '">' + subcategory.name + '</option>'
                            );
                        });
                    } else {
                        subcategoryDropdown.append('<option value="">No Subcategories Available</option>');
                    }
                },
                error: function() {
                    alert('Error fetching subcategories');
                }
            });
        }
    }
</script>
  
</body>

</html>