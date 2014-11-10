<div class="row clearfix">
    <strong><em><u><?php echo $reminder; ?></u></em></strong>
    <img style="float: left; height: 100px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/kpk-logo.jpg"/>

    <div class="text-center pull-right" style="width: 400px;">
        <address>
            <strong><span style="font-size: 14pt; font-family: 'Bookman Old Style'">
                    OFFICE OF THE DIRECTOR GENERAL<br />
                    PROVINCIAL HOUSING AUTHORITY</span></strong><br />
            (ATI Campus) Jamrud Road, Peshawar<br />
            <small>Phone: +92 91 9218265 &nbsp; Fax: +92 91 9218420</small><br />
            <small>Website: www.housingkp.gov.pk &nbsp; Email: dg.pha@hotmail.com</small>
        </address>
    </div>
</div>
<div class="text-right" id="ref" style="font-size: 10pt; line-height: 12pt;">
    No. DG/PHA/____________________________<br />
    Dated: <?php echo date(Yii::app()->user->getDateFormat(false)); ?>
</div>
<div class="row clearfix" style="font-size: 11pt; line-height: 14pt;">
    To
</div>
<div class="row clearfix" style="font-size: 11pt; line-height: 14pt;">
    <address style="margin-left: 1in;">
        <?php
        echo $data['name'] . ' S/D/W/o ' . $data['fname'] . '<br />';
        echo $data['postal_address'] . '<br />';
        echo $data['contact_1'] . ' ' . $data['contact_2'];
        ?>
    </address>
</div>

<div class="row clearfix" style="font-size: 11pt; line-height: 14pt;">
    <strong>Subject:
        <span class="text-uppercase" style="margin-left: 0.37in"><u>
                <?php echo strtoupper($data['payment_type'] . ' FOR ' . $scheme); ?>
            </u>
        </span>
    </strong><br/><br/>
</div>
<div class="row text-justify" style="font-size: 11pt; line-height: 14pt;">
    <p style="text-indent: 1in">
        Please refer to PHA's Allotment Order No. <?php echo $allotment->order_no; ?>
        dated <?php echo $allotment->date; ?>. 
        You were alloted Plot No. <?php echo $allotment->plot_no; ?>,
        Street No.<?php echo $allotment->street_no; ?>,
        <?php
        if (!empty($allotment->phase))
            echo ' Phase ' . $allotment->phase;
        if (!empty($allotment->sector))
            echo ', Sector ' . $allotment->sector;
        ?>
        measuring <?php
        echo $allotment->category->plot_size;
        echo ($allotment->category->corner ? ' (corner)' : '');
        ?> in the 
        category of <?php echo $allotment->category->category; ?>. 
        <?php echo $data['payment_type']; ?> of Rs.<?php echo number_format($data['amount']); ?>/- 
        was due on <?php echo date(Yii::app()->user->getDateFormat(false), strtotime($data['ddate'])); ?>. But till date you have not deposited
<?php echo $data['payment_type']; ?>.
    </p>

    <p>
        2.<span style="margin-left: 0.88in">You are directed to deposit <?php echo $data['payment_type']; ?> 
            amounting to Rs. <?php echo number_format($data['amount']); ?>/- plus Rs.99999/- as a 
            penalty @ (2% per month) for each day of delay for the amount in default. 
            Failure to pay the installment along with penalty charges within 12 months
            shall make your allotment liable to cancellation without any notice.</span>

    </p>

    <div class="text-center pull-right" style="width: 200px; margin-top: 35px;">
        <strong>Housing Officer-II</strong><br />
        Provincial Housing Authority
    </div>
</div>