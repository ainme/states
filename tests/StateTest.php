<?php

use PHPUnit_Framework_TestCase;
use \Tools\States\Invoice;
use \Tools\States\InvoiceContext;

class StateTest extends PHPUnit_Framework_TestCase
{

    /** @test */
    public function invoice_status_can_be_changed()
    {
        $invoice = new Invoice();
        $invoiceContext = new InvoiceContext($invoice);
        echo PHP_EOL . " changing from $invoice->status to approve" . PHP_EOL;
        $invoiceContext->approve();
        echo PHP_EOL . " changing from $invoice->status to send" . PHP_EOL;
        $invoiceContext->send();
        echo PHP_EOL . " changing from $invoice->status to process" . PHP_EOL;
        $invoiceContext->process();
        echo PHP_EOL . " changing from $invoice->status to process" . PHP_EOL;
        $invoiceContext->process();
        echo PHP_EOL . " changing from $invoice->status to reject" . PHP_EOL;
        $invoiceContext->reject('reason is ....');
        echo PHP_EOL . " changing from $invoice->status to hold" . PHP_EOL;
        $invoiceContext->hold('reason is ....');
        echo PHP_EOL . " changing from $invoice->status to hold" . PHP_EOL;
        $invoiceContext->hold('reason is ....');
        echo PHP_EOL . " changing from $invoice->status to approve" . PHP_EOL;
        $invoiceContext->approve();
        echo PHP_EOL . " changing from $invoice->status to send" . PHP_EOL;
        $invoiceContext->send();
        echo PHP_EOL . " changing from $invoice->status to sendBackToProcessing" . PHP_EOL;
        $invoiceContext->sendBackToProcessing();
        echo PHP_EOL . " changing from $invoice->status to finishedProcessing" . PHP_EOL;
        $invoiceContext->finishedProcessing();
        echo PHP_EOL . " changing from $invoice->status to process" . PHP_EOL;
        $invoiceContext->process();
        echo PHP_EOL . " changing from $invoice->status to approve" . PHP_EOL;
        $invoiceContext->approve();
        echo PHP_EOL . " inv status is $invoice->status" . PHP_EOL;
    }
}
