# Quy Tắc Git (Git Conventions)

Tài liệu này quy định cách làm việc với Git, cách đặt tên nhánh (Branch) và cách viết thông điệp Commit (Commit Messages) thống nhất cho dự án.

## 1. Quy tắc viết Commit Message

Dự án áp dụng tiêu chuẩn **Conventional Commits**. Mỗi commit message phải tuân theo cấu trúc sau và **bắt buộc sử dụng Tiếng Anh**:

```
<type>(<scope>): <subject_in_english>
```

### Các loại (Type) được phép dùng:
- **feat**: Thêm một tính năng mới.
- **fix**: Sửa lỗi (bug).
- **docs**: Chỉ thay đổi các file tài liệu (README, yêu cầu hệ thống,...).
- **style**: Các thay đổi không làm thay đổi logic code (format code, thiếu dấu chấm phẩy, indent,...).
- **refactor**: Tái cấu trúc code nhưng không sửa lỗi hay thêm tính năng mới.
- **perf**: Thay đổi code nhằm cải thiện hiệu năng xử lý.
- **test**: Thêm hoặc sửa test case.
- **chore**: Các thay đổi nhỏ, bảo trì hệ thống (update thư viện, sửa config tool, file `.gitignore`, v.v.).

### Ví dụ:
- `feat(auth): implement remember me functionality`
- `fix(cart): resolve incorrect total calculation when applying coupon`
- `docs: update setup guide documentation`
- `chore: remove redundant log files and configure .gitignore`

## 2. Quy tắc đặt tên Nhánh (Branch Naming Convention)

Tất cả các nhánh mới phải được tạo ra từ nhánh `main` (hoặc `develop` nếu dự án áp dụng Git Flow) và phải tuân theo quy tắc sau:

- `feat/tên-tính-năng`: Nhánh phát triển tính năng mới.
  - Ví dụ: `feat/shopping-cart`, `feat/user-login`
- `fix/tên-lỗi`: Nhánh sửa một lỗi cụ thể.
  - Ví dụ: `fix/checkout-calculation-error`
- `hotfix/tên-lỗi-nghiêm-trọng`: Sửa gấp một lỗi trên môi trường production.
- `chore/tên-công-việc`: Các công việc cấu hình, không liên quan tới tính năng thực tế.

## 3. Quy trình (Workflow) Đề Xuất

1. **Cập nhật code mới nhất**:
   ```bash
   git pull origin main
   ```
2. **Tạo nhánh mới**:
   ```bash
   git checkout -b feat/add-new-payment
   ```
3. **Commit code**:
   ```bash
   git add .
   git commit -m "feat(payment): integrate VNPay payment gateway"
   ```
4. **Push nhánh và tạo Pull Request (PR)**:
   ```bash
   git push origin feat/add-new-payment
   ```
   Sau đó tạo Pull Request trên GitHub/GitLab để review code trước khi gộp (merge) vào `main`.
