<?php
namespace Tools\States\ContextStates;

use Tools\States\ContextStates\ApprovedStatus;
use Tools\States\ContextStates\HeldStatus;
use Tools\States\ContextStates\ProcessingStatus;
use Tools\States\ContextStates\RejectedStatus;
use Tools\States\Contracts\InvoiceStateInterface;

class ProcessedStatus extends AbstractStatus implements InvoiceStateInterface
{
	protected $status = 'processed';

	public function createNew()
	{
		return $this->notAllowed('createNew');
	}

	public function send()
	{
		return $this->notAllowed('send');
	}

	public function sendBackToProcessing()
	{
		$this->invoiceContext->setInvoiceState(ProcessingStatus::class);
	}

	public function process()
	{
		return $this->notAllowed('process');
	}

	public function finishedProcessing()
	{
		$this->alreadyInStatus();
	}

	public function approve()
	{
		$this->invoiceContext->setInvoiceState(ApprovedStatus::class);
	}

	public function reject($reason)
	{
		$this->invoiceContext->setInvoiceState(RejectedStatus::class, $reason);
	}

	public function hold($reason)
	{
		$this->invoiceContext->setInvoiceState(HeldStatus::class, $reason);
	}

	public function settle()
	{
		return $this->notAllowed('settle');
	}

}