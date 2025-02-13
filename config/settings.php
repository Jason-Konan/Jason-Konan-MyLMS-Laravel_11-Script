<?php
return [
    'tax_value' => config('settings.tax.value'),
    'system_revenue' => config('settings.system.revenue'),
    'exchange_rate' => config('settings.exchange.rate', 634), // Taux de change XOF/USD
];
