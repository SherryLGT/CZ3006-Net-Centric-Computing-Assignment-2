var appleCost = 0.69;
var orangeCost = 0.59;
var bananaCost = 0.39;

var name;
var noOfApples = 0;
var noOfOranges = 0;
var noOfBananas = 0;
var paymentMethod = '';
var totalCost = 0;

$(document).ready(function () {    

    $('#apples').bind('input', function() {
        noOfApples = $(this).val();
        validator(noOfApples,'apples');
        calculateTotal(noOfApples, noOfOranges, noOfBananas);
    });

    $('#oranges').bind('input', function() {
        noOfOranges = $(this).val();
        validator(noOfOranges,'oranges');
        calculateTotal(noOfApples, noOfOranges, noOfBananas);
    });

    $('#bananas').bind('input', function() {
        noOfBananas = $(this).val();
        validator(noOfBananas,'bananas');
        calculateTotal(noOfApples, noOfOranges, noOfBananas);
    });

    $('#total').bind('focus', function() {
        document.getElementsByTagName("fieldset")[0].setAttribute('disabled', true);
    });
    
});

function validator(input, tag)
{
    if(!input.match(/^\d+$/) || input % 1 != 0)
    {
        $('#error').removeClass('hidden');
        $('#'+tag).parent('div').parent('div').addClass('has-error');
    }
    else
    {
        $('#error').addClass('hidden');
        $('#'+tag).parent('div').parent('div').removeClass('has-error');
    }
}

function calculateTotal(a, o, b)
{
    totalCost = (noOfApples * appleCost) + (noOfOranges * orangeCost) + (noOfBananas * bananaCost);
    document.getElementById('total').value = totalCost.toFixed(2);
}