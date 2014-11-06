<div class="row clearfix">
    <img style="float: left; height: 100px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/kpk-logo.jpg"/>

    <div class="text-center pull-right" style="width: 400px;">
        <address>
            <strong><span style="font-size: 14pt; line-height: 12pt; font-family: 'Bookman Old Style'">
                    OFFICE OF THE DIRECTOR GENERAL<br />
                    PROVINCIAL HOUSING AUTHORITY</span></strong><br />
            (ATI Campus) Jamrud Road, Peshawar<br />
            <small>Phone: +92 91 9218265 &nbsp; Fax: +92 91 9218420</small><br />
            <small>Website: www.housingkp.gov.pk &nbsp; Email: dg.pha@hotmail.com</small>
        </address>
    </div>
</div>
<div class="text-right" id="ref" style="font-size: 10pt;">
    No. <?php echo $model->order_no; ?><br />
    Dated: <?php echo $model->date; ?>
</div>
<div class="row clearfix" style="font-size: 11pt;">
    To
</div>
<div class="row clearfix" style="font-size: 11pt;">
    <address style="margin-left: 1in;">
        <?php
        echo $model->applicant->getNameWithTitle() . ' S/D/W/o ' . $model->applicant->fname . '<br />';
        echo $model->applicant->postal_address . '<br />';
        echo $model->applicant->contact_1 . ' ' . $model->applicant->contact_2;
        ?>
    </address>
</div>

<div class="row clearfix" style="font-size: 11pt;">
    <strong>Subject:
        <span class="text-uppercase" style="margin-left: 22px"><u>
                ALLOTMENT ORDER: <?php echo strtoupper($model->scheme->name); ?>
            </u></span></strong><br/><br/>
</div>
<div class="row" style="font-size: 11pt; ">
    <p class="text-justify" style="text-indent: 1in;">
        Residential Plot No. <?php echo $model->plot_no; ?>, Street No.
        <?php echo $model->street_no; ?>,
        <?php
        if (!empty($model->phase))
            echo ' Phase ' . $model->phase;
        if (!empty($model->sector))
            echo ', Sector ' . $model->sector;
        ?>
        measuring <?php
        echo $model->category->plot_size;
        echo ($model->category->corner ? ' (corner)' : '');
        ?> in the 
        category of <?php echo $model->category->category; ?> at
        <?php echo $model->scheme->name; ?>, is hereby alloted to you in 
        ballot draw held on <?php echo $model->scheme->draw_date; ?>,
        at a total cost of Rs.&nbsp;<?php echo number_format($model->category->cost); ?>/-
        (Down Payment of Rs.&nbsp;<?php echo number_format($model->applicant->payments_detail[0]->amount); ?>/-
        has already been received). Possession shall be given after completion of 
        essential services and payment of all dues.
    </p>

    <p>
        2.<span style="margin-left: 61px">Payment schedule for balance amount is as under: </span>
    <table style="font-size: 11pt; margin: 0px 0px 0px 72px; width: 350px; line-height: 0px;">
        <thead>
            <tr class="text-center">
                <td></td>
                <td style="border-bottom: 1px solid; text-align: right;"><b>Amount</b></td>
                <td style="border-bottom: 1px solid; text-align: center;"><b>Due Date</b></td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($model->applicant->due_dates as $due_date) {
                echo '<tr><td>' . $due_date->payment_type->payment_type . '</td>';
                echo '<td class="text-right">' . number_format($due_date->payment_type->amount) . '/-</td>';
                echo '<td class="text-center">' . $due_date->date . '</td></tr>';
            }
            ?>
        </tbody>
    </table>
</p>
<p class="text-justify">
    3.<span style="margin-left: 61px">A penalty of up to </span><?php echo $model->scheme->penalty; ?>%
    <?php echo substr($model->scheme->occurence, 0, 3) . " " . substr($model->scheme->occurence, 3); ?>
    shall be charged on delayed installments. The allotment of plot shall be cancelled by Provincial Housing Authority
    due to non-payment of dues with a period of further one year from the date of which 1st Installment
    of remaining 85% was due.
</p>
<p class="text-justify">
    4.<span style="margin-left: 61px">Lucky</span> owners of corner plots shall pay an additional amount equal to 5% of the
    total cost of the plot along with last installment.
</p>
<p class="text-justify">
    5.<span style="margin-left: 61px">A</span> Collection Account No. <?php echo $model->scheme->account; ?> 
    has been opened with the <?php echo $model->scheme->bank; ?>. 
    Allottees may deposit payment direct into the said branch.
</p>
<p class="text-justify">
    6.<span style="margin-left: 61px">Allottees</span> who want to remit money 
    from out stations shall obtain a Bank Draft in the name of Director General 
    (DG PHA <?php echo $model->scheme->name; ?>) from any bank and send the same
    relating to the installment to the PHA, ATI Campus Jamrud Road, Peshawar.
</p>
<p class="text-justify">
    7.<span style="margin-left: 61px">The</span> Provincial Housing Authority 
    reserves the right to change the master plan and cancel / alter the location 
    and dimensions until physical possession of the plot is handed over the allottee.
</p>

<div class="text-center pull-right" style="width: 200px; margin-top: 35px;">
    <strong>Housing Officer-II</strong><br />
    Provincial Housing Authority
</div>
</div>