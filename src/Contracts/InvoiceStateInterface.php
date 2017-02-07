<?php
namespace Tools\States\Contracts;

interface InvoiceStateInterface
{
	public function createNew();
	public function send();
	public function sendBackToProcessing();
	public function process();
	public function approve();
	// public function process();
	public function reject($reason);
	public function hold($reason);
	public function settle();
}