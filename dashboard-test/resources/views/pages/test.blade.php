
<div>
    <div id="notification" class="fixed top-5 right-5 transform transition-transform duration-300 translate-x-full">
        <div class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
            Action completed successfully!
        </div>
    </div>

    <button 
        onclick="handleHeartClick()" 
        class="w-40 h-40 rounded-full bg-gradient-to-r from-gray-100 to-white shadow-lg hover:scale-105 transition-transform duration-300 flex items-center justify-center text-5xl"
    >
        ❤️
    </button>

    @guest
        <div id="loginPopup" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
            <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded-2xl shadow-xl">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Please Login</h2>
                <a href="{{ route('login') }}" class="inline-block px-8 py-3 bg-gradient-to-r from-rose-400 to-rose-500 text-white font-semibold rounded-full hover:-translate-y-0.5 transition-transform duration-200 hover:shadow-lg">
                    Login
                </a>
            </div>
        </div>
    @endguest
</div>

<script>
function showNotification(message) {
    const notification = document.getElementById('notification');
    notification.querySelector('div').textContent = message;
    notification.classList.remove('translate-x-full');
    setTimeout(() => {
        notification.classList.add('translate-x-full');
    }, 3000);
}

async function handleHeartClick() {
    try {
        const response = await fetch('{{ route("check.login") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        });
        
        const data = await response.json();
        
        if (!data.logged_in) {
            document.getElementById('loginPopup').classList.remove('hidden');
        } else {
            showNotification('Liked!');
            // Add your like action here
        }
    } catch (error) {
        showNotification('An error occurred');
    }
}

document.getElementById('loginPopup')?.addEventListener('click', (e) => {
    if (e.target.id === 'loginPopup') {
        e.target.classList.add('hidden');
    }
});
</script>