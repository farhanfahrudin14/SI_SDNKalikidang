<script type="text/javascript">

   let tableFasilitas;

   // Show Table
   $(document).ready(function(){

      tableFasilitas = $('#tableFasilitas').DataTable({
         processing: true,
         serverSide: true,
         order: [],
         ajax: {
            'url': "<?= base_url('fasilitas/ajax_list') ?>",
            'type': "POST"
         },
         columnDefs: [
            { 
               'targets': [0, -1], 
               'orderable': false, 
            },
            { 
               'width': '10%', 
               'targets': -1 
            }
         ],
      });
   });

   // Reload Table
   function reload_table(){
      tableFasilitas.ajax.reload(null, false);
   }

   // Delete Fasilitas
   function delete_fasilitas(id){
      Swal.fire({
         title: 'Hapus Data Fasilitas ini ?',
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Hapus!'
      }).then((result) => {
         if (result.value) {

            $.ajax({
               type: 'POST',
               dataType: 'json',
               url: '<?= base_url('fasilitas/delete'); ?>',
               data: { id: id },

               success: function(data){
                  if(data.status){
                     reload_table();
                     Swal.fire({
                        icon: 'success',
                        title: 'Berhasil dihapus!',
                        showConfirmButton: true
                     });
                  }
               },

               error: function(){
                  Swal.fire({
                     icon: 'error',
                     title: 'Oops...',
                     text: 'Terjadi Suatu Kesalahan!',
                     showConfirmButton: true
                  });
               }

            });

         }
      });
   }

</script>
