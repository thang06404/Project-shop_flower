/**
 * FlowerShop - Client Interactions
 */

document.addEventListener('DOMContentLoaded', function () {
    // Tự động vô hiệu hóa nút submit form khi bấm để chống double submit
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function () {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn && !submitBtn.disabled) {
                const originalText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Đang xử lý...
                `;
                // Dự phòng trường hợp validate fail
                setTimeout(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }, 5000);
            }
        });
    });

    console.log('FlowerShop Client App Initialized.');
});
