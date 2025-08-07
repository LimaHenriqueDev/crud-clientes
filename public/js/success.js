document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
            const alert = document.getElementById('success-alert');
            if (alert) {
                let bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                bsAlert.close();
            }
        }, 5000);
});