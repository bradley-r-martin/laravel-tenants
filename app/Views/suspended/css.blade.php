<style type="text/css">
  @keyframes pulse {
    0% {
      transform: scale3d(0.35, 0.35, 0.35);
      opacity: 1;
    }
    70% {
      transform: scale3d(1, 1, 1);
      opacity: 0;
    }
    100% {
      transform: scale3d(0.35, 0.35, 0.35);
      opacity: 0;
    }  
  }
  .status{
    margin-bottom:30px;
    position:relative;
    display: flex;
    justify-content: center;
  }
  .indicator{
    --status-color: 255, 0, 100;
    width: 16px;
    height: 16px;
    border-radius: 8px;
    background-color: rgb(var(--status-color));
  }
  .pulse {
    position: absolute;
    top: 0;
    --status-color: 255, 0, 100;
    box-shadow: 0 0 0 12px rgba(var(--status-color), 0.6);
    animation: pulse 2s infinite;
  }
</style>