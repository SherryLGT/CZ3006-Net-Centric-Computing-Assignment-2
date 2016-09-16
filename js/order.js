var appleCost = 0.69;
var orangeCost = 0.59;
var bananaCost = 0.39;

var username;
var noOfApples = 0;
var noOfOranges = 0;
var noOfBananas = 0;
var paymentMethod = "";
var totalCost = 0;

$(document).ready(function () {    
    $("#apples").bind("input", function() {
        noOfApples = $(this).val();
        if(!noOfApples.match(/^\d+$/) || noOfApples % 1 != 0) {
            $("#apples").parent("div").parent("div").addClass("has-error");
        }
        else {
            $("#apples").parent("div").parent("div").removeClass("has-error");
        }
        calculateTotal(noOfApples, noOfOranges, noOfBananas);
    });
    $("#oranges").bind("input", function() {
        noOfOranges = $(this).val();
        if(!noOfOranges.match(/^\d+$/) || noOfOranges % 1 != 0) {
            $("#oranges").parent("div").parent("div").addClass("has-error");
        }
        else {
            $("#oranges").parent("div").parent("div").removeClass("has-error");
        }
        calculateTotal(noOfApples, noOfOranges, noOfBananas);
    });
    $("#bananas").bind("input", function() {
        noOfBananas = $(this).val();
        if(!noOfBananas.match(/^\d+$/) || noOfBananas % 1 != 0) {
            $("#bananas").parent("div").parent("div").addClass("has-error");
        }
        else {
            $("#bananas").parent("div").parent("div").removeClass("has-error");
        }
        calculateTotal(noOfApples, noOfOranges, noOfBananas);
    });
});

function isDigit(input)
{

}

function calculateTotal(a, o, b)
{
    totalCost = (noOfApples * appleCost) + (noOfOranges * orangeCost) + (noOfBananas * bananaCost);
    document.getElementById("total").value = totalCost.toFixed(2);
}