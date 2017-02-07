<?php
namespace Tools\States;

use Tools\States\ApprovedStatus;
use Tools\States\DraftStatus;
use Tools\States\PendingStatus;

class InvoiceContext
{
	protected $invoiceState = null;

	public function __construct(Invoice $invoice)
	{
		$this->invoice = $invoice;
		$this->contextState = $invoice->getCurrentContextState($this);
	}

	public function setInvoiceState($stateClass, $reason = null)
	{
		$this->contextState = new $stateClass($this);
		$this->invoice->status = $this->contextState->getStatus();
		$this->invoice->reason = $reason;
	}

	public function createNew()
	{
		return $this->contextState->createNew();
	}

	public function send()
	{
		return $this->contextState->send();
	}

	public function sendBackToProcessing()
	{
		return $this->contextState->sendBackToProcessing();
	}

	public function process()
	{
		return $this->contextState->process();
	}

	public function finishedProcessing()
	{
		return $this->contextState->finishedProcessing();
	}

	public function approve()
	{
		return $this->contextState->approve();
	}

	public function reject($reason)
	{
		return $this->contextState->reject($reason);
	}

	public function hold($reason)
	{
		return $this->contextState->hold($reason);
	}

	public function settle()
	{
		return $this->contextState->settle();
	}
}