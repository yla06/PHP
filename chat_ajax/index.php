<?php
require_once 'bootstrap.php';
echo '<script
			  src="https://code.jquery.com/jquery-3.1.1.min.js"
			  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
			  crossorigin="anonymous"></script>';
echo '<script
			  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
			  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
			  crossorigin="anonymous"></script>';
echo '<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />';
getInfoBlock(  );
?>

<div id="posts"></div>

<?php if ( isset( $_SESSION['auth'] ) ): ?>
<div id="add-info"></div>
<form action="" method="post" id="add-form">
  <label>Ваше повідомлення</label><br />
  <textarea name="chat_text"></textarea><br />

  <input type="hidden" name="token" value="<?= session_id(  ) ?>" />
  <input type="submit" id="add" value="Відправити" />
</form>

<?php endif ?>


<script>
  $( document ).ready( function(  ){
    token = '<?= session_id(  ) ?>';
    $(document).on('click', '#add', function(e){
      e.preventDefault();
      $('#add-info').text('');
      $('.errors').remove();
      $.post( 'ajax.php?action=add', $('#add-form').serialize(), function( resp ){
        if ( resp.status == '1')
        {
          $('#add-info').text(resp.result.text);
           var div = $('<div />').addClass('post').attr('data-id', resp.data.blog_id)
              .append( $( '<div />').text(resp.data.blog_text) );
          $('#posts').append( div.show(1500) );
          $('#add-form')[0].reset();
        }
        else
        {
          $('#add-info').text(resp.info);
          $.each(resp.error, function(a,b){
            $('<div />').addClass('errors').text(b).insertAfter( $('#add-form').find('[name="'+a+'"]') );
          });
        }
      }, 'json');
    });
    $.get( 'ajax.php', {action:'index_json'}, function( resp ){
      if ( resp.status == 1 )
      {
        $.each(resp.result, function(a,b){
          var div = $('<div />').addClass('post').attr('data-id', b.blog_id)
              .append( $( '<div />').text(b.blog_text) );
          $('#posts').append( div.show(1500) );
        });
      }
      else
        alert( resp.info );
    }, 'json' );
  } );
</script>
