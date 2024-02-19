<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title><?php echo $title ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/css/general.css?v.4" rel="stylesheet" type="text/css">
    <link href="/css/style.css?v.4" rel="stylesheet" type="text/css">
    <script language="JavaScript" src="/js/general.js?v.6" type="text/javascript"></script>
    <script language="JavaScript" src="/js/js.js?v.6" type="text/javascript"></script>
    <script language="JavaScript" src="/js/ajax.js?v.6" type="text/javascript"></script>
    <script language="JavaScript" src="/js/table.js?v.6" type="text/javascript"></script>
</head>

<body>
<?php require A_PATH_APP.DS.'view'.DS.'menu_tpl.php' ?>
<div class="container" id="content">
    <input id="t1_url" type="hidden" value="<?php echo href('controller=debtor','action=ajax') ?>">
    <form  action="" method="post" name="filterForm" onSubmit="ajaxTable('t1','filter'); return false">
        <div id="b0">
            <table border='1' style='border-collapse: collapse;'>
                <tr>
                    <td id="b1" rowspan="2">
                        <label>Фамилия / Ф.И.О.
                            <input name="fLastname" id="fLastname" type="text" value="<?php echo $arr['fLastname'] ?>"></label>
                        <label>Имя
                            <input name="fFirstname" id="fFirstname" type="text" value="<?php echo $arr['fFirstname'] ?>"></label>
                        <label>Отчество
                            <input name="fMiddlename" id="fMiddlename" type="text" value="<?php echo $arr['fMiddlename'] ?>"></label>
                        <label>№ договора
                            <input name="fContractnum" id="fContractnum" type="text" value="<?php echo $arr['fContractnum'] ?>"></label>
                    </td>
                    <td id="b2" rowspan="2">
          <span>Перв. задолженность
            <input name="fTotalDebtS" type="text" id="fTotalDebtS" value="<?php echo $arr['fTotalDebtS'] ?>" onPropertyChange="this.onkeyup();" onInput="this.onkeyup();" onKeyUp="checkNum(this.id);">
            -
            <input name="fTotalDebtF" type="text" id="fTotalDebtF" value="<?php echo $arr['fTotalDebtF'] ?>" onPropertyChange="this.onkeyup();" onInput="this.onkeyup();" onKeyUp="checkNum(this.id);"></span>
                        <span>К погашению
            <input name="fCurDebtS" type="text" id="fCurDebtS" value="<?php echo $arr['fCurDebtS'] ?>" onPropertyChange="this.onkeyup();" onInput="this.onkeyup();" onKeyUp="checkNum(this.id);">
            -
            <input name="fCurDebtF" type="text" id="fCurDebtF" value="<?php echo $arr['fCurDebtF'] ?>" onPropertyChange="this.onkeyup();" onInput="this.onkeyup();" onKeyUp="checkNum(this.id);"></span>
                        <span>Дата действия
            <input name="fActDateS" type="text" id="fActDateS" value="<?php echo $arr['fActDateS'] ?>" readonly>
            <img src="/img/16-calendar.png" onClick="showCalendar('fActDateS');"> -
            <input name="fActDateF" type="text" id="fActDateF" value="<?php echo $arr['fActDateF'] ?>" readonly>
            <img src="/img/16-calendar.png" onClick="showCalendar('fActDateF');"></span>
                        <select name="fResult" id="fResult">
                            <?php echo getOption($fResult,$arr['fResult'],'Выберите статус') ?></select>
                    </td>
                    <td id="b3" rowspan="2">
                        <select name="fBranch" id="fBranch" onChange="anyChange(this.id,'fUser','user');">
                            <?php echo getOption($fBranch,$arr['fBranch'],'Выберите РП') ?></select>
                        <select name="fUser" id="fUser">
                            <?php echo getOption($fUser,$arr['fUser'],'Выберите оператора') ?></select>
                        <select name="fClient" id="fClient" onChange="anyChange(this.id,'fRegister','register');">
                            <?php echo getOption($fClient,$arr['fClient'],'Выберите заказчика') ?></select>
                        <select name="fRegister" id="fRegister">
                            <?php echo getOption($fRegister,$arr['fRegister'],'Выберите реестр') ?></select>
                    </td>
                    <td id="b4">
                        <select name="fGroup" id="fGroup">
                            <?php echo getOption($fGroup,$arr['fGroup'],'Стадия') ?></select>
                        <select name="fState" id="fState">
                            <?php echo getOption($fState,$arr['fState'],'Состояние') ?></select>
                        <select name="fExtra" id="fExtra">
                            <?php echo getOption($fExtra,$arr['fExtra'],'Дополнительно') ?></select>
                    </td>
                    <td id="b5">
                        <input type="submit" name="submitFilter" value="Обновить">
                        <input name="resetFilter" type="button" onClick="resetFilterForm();" value="Сброс">
                    </td>
                    <td rowspan="3" width="50%">
                        <p style='font-size: 20px;'>
                            <!--			--><?php	//
                            //				$cur_month = 0;
                            //				$PLAN = 0;
                            //				$FACT = 0;
                            //
                            //				//Получить "План взысканий" на текущий месяц
                            //				//Получить текущий месяц
                            //				$query = ibase_query('select EXTRACT(month FROM (CAST(\'now\' AS date)) ) from rdb$database');
                            //				$row = ibase_fetch_row($query);
                            //				$cur_month = $row[0];
                            //				$cur_month_name = getMonthName($cur_month);
                            //
                            //				//Получить План на текущий месяц
                            //				//echo $_SESSION['user_id']; - ID авторизованного пользователя
                            //
                            //				$user_id = $arr['fUser'];		//Выбранный инспектор
                            //				$query = ibase_query("
                            //					SELECT f_plan_sum
                            //					FROM t_user_plan
                            //					WHERE extract(month from f_plan_date) = $cur_month
                            //					  AND f_user_id = $user_id
                            //				");
                            //				$row = ibase_fetch_row($query);
                            //				$PLAN = $row[0];
                            //
                            //				//Получить Фактическую сумму взысканий
                            //				if(strlen($cur_month) == 1){ $cur_month = "0$cur_month"; }
                            //				$start_date = "01.".$cur_month.".2017";
                            //				switch($cur_month)
                            //				{
                            //					case '01': $stop_date = "31.".$cur_month.".2017"; break;
                            //					case '02': $stop_date = "28.".$cur_month.".2017"; break;
                            //					case '03': $stop_date = "31.".$cur_month.".2017"; break;
                            //					case '04': $stop_date = "30.".$cur_month.".2017"; break;
                            //					case '05': $stop_date = "31.".$cur_month.".2017"; break;
                            //					case '06': $stop_date = "30.".$cur_month.".2017"; break;
                            //					case '07': $stop_date = "31.".$cur_month.".2017"; break;
                            //					case '08': $stop_date = "31.".$cur_month.".2017"; break;
                            //					case '09': $stop_date = "30.".$cur_month.".2017"; break;
                            //					case '10': $stop_date = "31.".$cur_month.".2017"; break;
                            //					case '11': $stop_date = "30.".$cur_month.".2017"; break;
                            //					case '12': $stop_date = "31.".$cur_month.".2017"; break;
                            //					default: break;
                            //				}
                            //
                            //				$query = ibase_query("
                            //					SELECT COUNT(f_id), SUM(f_pay)
                            //					FROM vw_debt_payment
                            //					WHERE f_pay_date>='$start_date' AND f_pay_date<='$stop_date'
                            //					  AND f_branch_id=1 AND f_user_id=$user_id AND f_branch_id>-1 AND f_user_id>-1 AND f_pay_status_id<>4
                            //				");
                            //				$row = ibase_fetch_row($query);
                            //				$FACT = $row[1];
                            //
                            //				//Рассчитать зарплату
                            //				$SALARY = getSalary($FACT);
                            //
                            //				$PLAN_STR = editNum($PLAN);
                            //				$FACT_STR = editNum($FACT);
                            //				$SALARY_STR = editNum($SALARY);
                            //
                            //				$color = "red";
                            //				if($FACT > $PLAN){ $color = "green"; }
                            //
                            //				echo "
                            //				<table width='50%' style='font-size: 16px;'>
                            //					<tr align='left'>
                            //						<td width='10%'>&nbsp;</td>
                            //						<td width='20%'>Месяц</td>
                            //						<th width='70%'>$cur_month_name</th>
                            //					</tr>
                            //					<tr align='left'>
                            //						<td>&nbsp;</td>
                            //						<td>План</td>
                            //						<th>$PLAN_STR</th>
                            //					</tr>
                            //					<tr align='left'>
                            //						<td>&nbsp;</td>
                            //						<td>Факт</td>
                            //						<th style='color: $color'>$FACT_STR</th>
                            //					</tr>
                            //					<tr align='left'>
                            //						<td>&nbsp;</td>
                            //						<td>З/П</td>
                            //						<th>$SALARY_STR</th>
                            //					</tr>
                            //				</table>";
                            //
                            //				function getMonthName($month)
                            //				{
                            //					switch($month)
                            //					{
                            //						case 1: 	$res = "январь"; break;
                            //						case 2: 	$res = "февраль"; break;
                            //						case 3: 	$res = "март"; break;
                            //						case 4: 	$res = "апрель"; break;
                            //						case 5: 	$res = "май"; break;
                            //						case 6: 	$res = "июнь"; break;
                            //						case 7: 	$res = "июль"; break;
                            //						case 8: 	$res = "август"; break;
                            //						case 9: 	$res = "сентябрь"; break;
                            //						case 10: 	$res = "октябрь"; break;
                            //						case 11: 	$res = "ноябрь"; break;
                            //						case 12: 	$res = "декабрь"; break;
                            //						default: 	$res = "не определен"; break;
                            //					}
                            //					return $res;
                            //				}
                            //
                            //				function getSalary($fact)
                            //				{
                            //					$percent = 0;
                            //					if( ($fact >= 0)and($fact <= 799999) ){ $percent = 3; }
                            //					if( ($fact >= 800000)and($fact <= 1499999) ){ $percent = 4; }
                            //					if( ($fact >= 1500000)and($fact <= 2999999) ){ $percent = 5; }
                            //					if( ($fact >= 3000000)and($fact <= 7999999) ){ $percent = 6; }
                            //					if( ($fact >= 8000000) ){ $percent = 7; }
                            //					$salary = $fact * $percent / 100;
                            //					return $salary;
                            //				}
                            //			?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label>Номер телефона
                            <input name="fPhone" type="text" id="fPhone" value="<?php echo $arr['fPhone'] ?>"></label>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        ИИН <input name="fIin" id="fIin" type="text" value="<?php echo $arr['fIin'] ?>" size="30">
                        Место работы <input name="fWp" id="fWp" type="text" value="<?php echo $arr['fWp'] ?>" maxlength="50">
                        Адрес <input name="fAdds" id="fAdds" type="text" value="<?php echo $arr['fAdds'] ?>" maxlength="50">
                        <select name="fSocStatus" id="fSocStatus">
                            <?php echo getOption($fSocStatus,$arr['fSocStatus'],'Социальный статус') ?></select>
                        Дата напоминания <input name="fEventDate" type="text" id="fEventDate" value="<?php echo $arr['fEventDate'] ?>" readonly>
                        <img src="/img/16-calendar.png" onClick="showCalendar('fEventDate');"><br>

                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="right">
			<span>Дата плана
            <input name="fPlanDateS" type="text" id="fPlanDateS" value="<?php echo $arr['fPlanDateS'] ?>" readonly>
            <img src="/img/16-calendar.png" onClick="showCalendar('fPlanDateS');"> -
            <input name="fPlanDateF" type="text" id="fPlanDateF" value="<?php echo $arr['fPlanDateF'] ?>" readonly>
            <img src="/img/16-calendar.png" onClick="showCalendar('fPlanDateF');"></span>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <div class="container">
        <table id="t0">
            <tr>
            </tr>
        </table>
        <div id="cContainer"><?php require A_PATH_APP.DS.'view'.DS.'debtor'.DS.'tbody_tpl.php' ?>
        </div>
        <table id="t2">
            <tr>
            </tr>
        </table>
    </div>
    <div id="pagination">
        <div><?php require A_PATH_APP.DS.'view'.DS.'pagination_tpl.php' ?></div>
        <div id="btnGroup">
            <ul>
                <?php require $btnGroup ?>
                <li onClick="exportXls('<?php echo href("controller=debtor","action=exportXls") ?>');"><img src="/img/16-excel.png"> Экспорт</li>
            </ul>
        </div>
    </div>
</div>
<div id="card"><iframe></iframe><?php require A_PATH_APP.DS.'view'.DS.'dcard_tpl.php' ?></div>
<div class="menuInfo">
    <ul id="tab">
        <li id="tab0">&nbsp;</li>
        <li class="active" id="tab1" onClick="showTabSheet(this.id,'<?php echo href('controller=dcard','action=info') ?>');">Общая</li>
        <li id="tab2" onClick="showTabSheet(this.id,'<?php echo href('controller=dcard','action=history') ?>');">Мерроприятия</li>
        <li id="tab3" onClick="showTabSheet(this.id,'<?php echo href('controller=dcard','action=phone') ?>','tabPhone');">Телефоны</li>
        <li id="tab4" onClick="showTabSheet(this.id,'<?php echo href('controller=dcard','action=adds') ?>','tabAdds');">Адреса</li>
        <li id="tab5" onClick="showTabSheet(this.id,'<?php echo href('controller=dcard','action=graph') ?>');">График оплат</li>
        <li id="tab9" onClick="showTabSheet(this.id,'<?php echo href('controller=dcard','action=credit') ?>');">Кредиты</li>
        <li id="tab7" onClick="showTabSheet(this.id,'<?php echo href('controller=dcard','action=wp') ?>');">Место работы</li>
        <li id="tab8" onClick="showTabSheet(this.id,'<?php echo href('controller=dcard','action=scheduler') ?>');">Планировщик</li>
    </ul>
    <input id="tabSheetUrl" type="hidden" value="<?php echo href('controller=dcard','action=info') ?>">
</div>
<div id="infoForm">
    <div class="tabForm" id="tabPhone">
        <form action="<?php echo href('controller=dcard','action=phoneSave') ?>"
              method="post" name="phoneForm" onSubmit="saveForm(this,'t1'); return false">
            <label>Код - номер телефона (10 знаков)
                +7
                <input name="phoneNum" type="text" id="phoneNum"
                       onPropertyChange="this.onkeyup();"
                       onInput="this.onkeyup();"
                       onKeyUp="checkPhoneNum(this.id);" maxlength="10"></label>
            <label class="type">Выберите тип <select name="phoneType"><?php echo getOption($phoneType,-1,'Тип тел.') ?></select></label><br>
            <label>Примечание: осталось <b id="remain2">50</b> символов
                <input name="phoneNote" type="text" id="phoneNote" rows="1"
                       onPropertyChange="this.onkeyup();"
                       onInput="this.onkeyup();"
                       onKeyUp="return checkLen(50,this.id);"></label>
            <input name="savePhone" type="submit" class="save" value="Сохранить">
        </form>
    </div>
    <div class="tabForm" id="tabAdds">
        <form action="<?php echo href('controller=dcard','action=addsSave') ?>"
              method="post" name="addsForm" onSubmit="saveForm(this,'t1'); return false">
            <div>
                <label>Область
                    <select name="province" id="province" onChange="anyChange(this.id,'region');">
                        <?php echo getOption($province,-1,'Выберите область') ?>
                    </select></label><br>
                <label>Район/Город
                    <select name="region" id="region">
                        <?php echo getOption($region,-1,'Выберите район / город') ?>
                    </select></label><br>
                <div class="r">Адрес: осталось <b id="remain3">50</b> символов<br>
                    <textarea name="adds" class="comment" id="adds"
                              onPropertyChange="this.onkeyup();"
                              onInput="this.onkeyup();"
                              onKeyUp="return checkLen(50,'remain3','adds');"></textarea></div>
            </div>
            <label class="type">Тип адреса
                <select name="addsType">
                    <?php echo getOption($addsType,-1,'Выберите тип адреса') ?>
                </select></label><br>
            <label>Примечание: осталось <b id="remain2">50</b> символов<br>
                <input name="phoneNote" type="text" id="phoneNote" rows="1"
                       onPropertyChange="this.onkeyup();"
                       onInput="this.onkeyup();"
                       onKeyUp="return checkLen(50,'remain2','phoneNote');"></label><br><br>
            <input name="savePhone" type="submit" class="save" value="Сохранить">
        </form>
    </div>
</div>
<div class="container" id="info"></div>
<div id="contextMenu" class="menu">
    <ul>
        <li class="icon_coins_16">Реквизиты на платеж</li>
        <li class="icon_extra_16">Изменить статус</li>
        <li class="icon_users_16">Сменить ответственного</li>
    </ul>
</div>
<?php require A_PATH_APP.DS.'view'.DS.'bottom_tpl.php' ?>
<div id="reminder" class="remHide">
    <div id="remHead"><div style="width:224px; cursor:pointer" onClick="reminder();">Напоминалка</div>
        <img src="/img/16-minus.png" onClick="getObj('reminder').className = 'remHide';"></div>
    <div id="remBody">
        <p><b>Запланировано действии: <b id="f10"></b></b> <blockquote> Из них выполнено: <b id="f11"></b> </blockquote></p>
        <p><b>Обещано оплат: <b id="f20"></b></b> <blockquote> Из них оплатили: <b id="f21"></b> </blockquote></p>
    </div>
</div>
<script language="javascript">
    markActiveFilter();
    table('t1','firstload');
    addHandler(getObj('cContainer'), "scroll", onScroll);
    // url адрес для вкладок
    var tabSheetUrl = getObj('tabSheetUrl').value;
    // Заполнение формы
    function setCard(row)
    {
        // Загрузка доп. информации
        getInfoData(row.id);
        // масств форм
        var form = getObj('infoForm').getElementsByTagName("form");
        // Сброс значении форм
        for (var i = 0; i < form.length; i++) {
            resetForm(form[i]);
        }
        var td = row.getElementsByTagName('td');
        getObj('card_name').innerHTML = td[getObj('_name').cellIndex].innerHTML;
        getObj('card_client').innerHTML = td[getObj('_client').cellIndex].innerHTML;
        getObj('card_branch').innerHTML = td[getObj('_branch').cellIndex].innerHTML;
        getObj('card_user').innerHTML = td[getObj('_user').cellIndex].innerHTML;
    }

    function contextMenu(row)
    {
        modalBox = getObj('contextMenu');
        modalBox.style.display = 'block';
        modalBox.style.top = getOffset(getObj(row.id)).top + 18 + 'px';
        addHandler(document,"click",hideMB);
    }
</script>
</body>
</html>
