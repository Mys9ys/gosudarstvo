/**
 * Created by Мусяус on 20.01.2017.
 */
$(function()
{
    $('.nextday').click(function()
    {
        kalendar();
    });
});

function kalendar()
{
    var day = $('.day').text();
    var month = $('.month').text();
    var year = $('.year').text();
    day++;
    if (day==7)
    {
        day =1; month++;
        if(month==5)
        {
            month=1; year++;
        }
    }
    $('.day').text(day);
    $('.month').text(month);
    $('.year').text(year);
    totalday=day+6*(month-1)+24*(year-1);
    ajaxkalendar(totalday,day,month,year);
}

function ajaxkalendar(totalday,day,month,year)
{
    $.ajax(
    {
        url: "inputjson.php",
        type: "POST",
        dataType: "json",
        data: {totalday: totalday, day: day, month: month, year: year}
    });
}
// Основание государства
$(function ()
{
    $('#Bfirstenter').click(function ()
    {
        var country_name=$('#Ifirstenter').val();
        $.ajax(
        {
            url: "inputjson.php",
            type: "POST",
            dataType: "json",
            data: {country_name: country_name}
        });
        location.reload();
    })
});
// сброс данных
$(function ()
{
    $('#reset').click(function ()
    {
        var reset=1;
        $.ajax(
        {
            url: "inputjson.php",
            type: "POST",
            dataType: "json",
            data: {reset: reset}
        });
        location.reload();
    })
})
// добавление человечков
$(function ()
{
    $('#create_human').click(function ()
    {
        var count_creat_human=$('#count_creat_human').val();
        $.ajax(
        {
            url: "inputjson.php",
            type: "POST",
            dataType: "json",
            data: {count_creat_human: count_creat_human}
        });
        $('#human_create_box').empty();
        alert(count_creat_human+' человечков успешно добавлены!');
    })
})
// обработка селекта по специализациям
$(function ()
{
    var select_specialization = 1;
    $.ajax(
    {
        url: "inputjson.php",
        type: "POST",
        dataType: "json",
        data: {select_specialization: select_specialization},
        success: function(json)
        {
            $.each(json.specialization, function(index, value)
            {
                var teg='<option value="'+value.id+'">'+value.specialization+'</option>';
                $('#company_specialization').append(teg);
            })
        }
    });

})
            //Создание новой компании
$(function ()
{
    $('#create_company').click(function ()
    {
        var company_name = $('#company_name').val();
        var company_abbreviation = $('#company_abbreviation').val();
        var company_specialization = $('#company_specialization').val();
        var sample_company = $('#sample_company').val();
        $.ajax(
        {
            url: "inputjson.php",
            type: "POST",
            dataType: "json",
            data: {company_name: company_name, company_abbreviation:company_abbreviation, company_specialization:company_specialization, sample_company:sample_company }
        });
        $('#company_create_box').append('<br><span>Компания <b>'+company_name+'</b> успешно создана</span>');
    })
})
            // Кнопка вызова меню создания компании
$(function ()
{
    $('#view_create_company').click(function ()
    {
        $('#company_create_box').toggle();
    })

})
            // выпадающий список шаблонных компаний
$(function ()
{
    var sampleCompany = 1;
    $.ajax(
        {
            url: "inputjson.php",
            type: "POST",
            dataType: "json",
            data: {sampleCompany: sampleCompany},
            success: function(json)
            {
                $.each(json.sampleCompany, function(index, value)
                {
                    var teg='<option value="'+value.id+'">'+value.name+'</option>';

                    $('#sample_company').append(teg);
                })
                alert(teg);
            }
        });

})