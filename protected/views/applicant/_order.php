<div class="row clearfix">
    <img style="float: left; height: 100px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/kpk-logo.jpg"/>

    <div class="text-center pull-right" style="width: 350px;">
        <address>
            <strong><span style="font-size: 12pt; font-family: 'Bookman Old Style'">
                    OFFICE OF THE DIRECTOR GENERAL<br />
                    PROVINCIAL HOUSING AUTHORITY</span></strong><br />
            (ATI Campus) Jamrud Road, Peshawar<br />
            <small>Phone: +92 91 9218265, 9218445  Fax: +92 91 9218420</small><br />
            <small>Website: www.housingkp.gov.pk  Email: dg.pha@hotmail.com</small>
        </address>
    </div>
</div>
<div class="text-right" id="ref" style="font-size: 13px;">
    No. <?php echo $model->allotment->order_no; ?><br />
    Dated: <?php echo $model->allotment->date; ?>
</div>
<div class="row clearfix" style="font-size: 13px;">
    To
</div>
<div class="row clearfix" style="font-size: 13px;">
    <address style="margin-left: 72px;">
        <?php
        echo $model->getNameWithTitle() . ' S/D/W/o ' . $model->fname . '<br />';
        echo $model->postal_address . '<br />';
        echo $model->contact_1 . ' ' . $model->contact_2;
        ?>
    </address>
</div>

<div class="row clearfix" style="font-size: 13px;">
    <strong>Subject:
        <span class="text-uppercase" style="margin-left: 18px"><u>
                ALLOTMENT ORDER: <?php echo $model->allotment->scheme->name; ?>
            </u></span></strong><br/><br/>
</div>
<div class="row" style="font-size: 13px;">
    <p class="text-justify" style="text-indent: 72px">
        Residential Plot No. <?php echo $model->allotment->plot_no; ?>, Street No.
        <?php echo $model->allotment->street_no; ?>
        <?php if (!empty($model->allotment->phase)) : ?>
            , Phase <?php echo $model->allotment->phase; ?>
        <?php endif; ?>
        <?php if (!empty($model->allotment->sector)): ?>
            , Sector <?php echo $model->allotment->sector; ?>
        <?php endif; ?> 
        measuring <?php echo $model->allotment->category->plot_size; ?> marla in the 
        category of <?php echo $model->allotment->category->FullCategory; ?> at
        <?php echo $model->allotment->scheme->name; ?>, is hereby alloted to you in 
        ballot draw held on <?php echo $model->allotment->scheme->draw_date; ?>,
        at a total cost of Rs.&nbsp;<?php echo number_format($model->allotment->category->cost); ?>
        (Down Payment of Rs.&nbsp;<?php echo number_format($model->payments_detail[0]->amount); ?>
        has already been received). Possession shall be given after completion of 
        essential services and payment of all dues.
    </p>

    <p>
        2.<span style="margin-left: 61px">Payment schedule for balance amount is as under: </span>
    <table style="font-size: 12px; margin: 0px 0px 0px 72px; width: 400px; line-height: 0px;">
        <thead>
            <tr class="text-center">
                <td></td>
                <td style="border-bottom: 1px solid; text-align: right;"><b>Amount</b></td>
                <td style="border-bottom: 1px solid; text-align: right;"><b>Due Date</b></td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($model->due_dates as $due_date) {
                echo '<tr><td>' . $due_date->payment_type->payment_type . '</td>';
                echo '<td class="text-right">' . number_format($due_date->payment_type->amount) . '</td>';
                echo '<td class="text-right">' . $due_date->date . '</td></tr>';
            }
            ?>
        </tbody>
    </table>
    </p>
    <p>
        3.<span style="margin-left: 61px">A penalty of up to </span><?php echo $model->allotment->scheme->penalty; ?>
        <?php echo $model->allotment->scheme->
    </p>

</div>