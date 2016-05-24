/*
 * Spoilers v0.1
 * By David McCoy
 * What's a license?
 */

(function($) {
  $('.date-sort').click(function(e) {
    var $this = $(this),
        id = $this.attr('id');
    $('.date').hide();
    $('.card').hide();
    $('.' + id).show();
  })

  $('select').change(function(e) {
    var dateOption = $('select.date-select').val() === 'all' ? 'card' : $('select.date-select').val(),
        colorOption = $('select.color-select').val() === 'all' ? 'card' : $('select.color-select').val(),
        typeOption = $('select.type-select').val() === 'all' ? 'card' : $('select.type-select').val(),
        rarityOption = $('select.rarity-select').val() === 'all' ? 'card' : $('select.rarity-select').val();

    // if (dateOption === 'all') {
    //   $('.date').show();
    //   $('.card').show();
    // } else {
    //   $('.date').hide();
    //   $('.card').hide();
    //   $('.' + option).show();
    // }

    console.log(dateOption);
    console.log(colorOption);
    console.log(typeOption);
    console.log($('.' + dateOption + '.' + colorOption + '.' + typeOption));
    $('.date').hide();
    $('.card').hide();
    $('.' + dateOption + '.' + colorOption + '.' + typeOption + '.' + rarityOption).show();

  })

})(jQuery);
