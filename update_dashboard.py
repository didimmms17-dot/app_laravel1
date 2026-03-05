import re

# Update dashboard.blade.php
with open('resources/views/dashboard.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()
    
# Replace all heart buttons with Detail links
content = re.sub(
    r'<button class="btn-small btn-outline-small">[^<]*</button>', 
    '<a href="{{ route(\'books.show\', 1) }}" class="btn-small btn-outline-small">👁️ Detail</a>', 
    content
)

with open('resources/views/dashboard.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)

print('✓ Updated dashboard.blade.php with Detail buttons')
