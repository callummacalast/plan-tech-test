import { RefObject, useRef, useState } from 'react'

const useVideoControls = (videoRef: RefObject<HTMLVideoElement | null>) => {
  const [isHovered, setIsHovered] = useState(false)
  const [isPlaying, setIsPlaying] = useState(true)
  const [isMute, setIsMute] = useState(true)
  const [currentTime, setCurrentTime] = useState(0)
  const [duration, setDuration] = useState(0)

  const hoverTimerRef = useRef<ReturnType<typeof setTimeout> | null>(null)

  const handleMouseEnter = () => {
    if (hoverTimerRef.current) {
      clearTimeout(hoverTimerRef.current)
    }

    hoverTimerRef.current = setTimeout(() => {
      setIsHovered(true)
      setIsPlaying(true)
      if (videoRef.current) {
        void videoRef.current.play()
      }
    }, 500)
  }

  const handleMouseLeave = () => {
    if (hoverTimerRef.current) {
      clearTimeout(hoverTimerRef.current)
      hoverTimerRef.current = null
    }

    setIsHovered(false)
    setCurrentTime(0)
    setIsPlaying(false)
    setIsMute(true)

    if (videoRef.current) {
      videoRef.current.pause()
      videoRef.current.currentTime = 0
    }
  }

  const togglePlay = () => {
    if (!videoRef.current) return

    if (videoRef.current.paused) {
      void videoRef.current.play()
      setIsPlaying(true)
    } else {
      videoRef.current.pause()
      setIsPlaying(false)
    }
  }

  const toggleAudio = () => {
    if (videoRef.current) {
      videoRef.current.muted = !videoRef.current.muted
      setIsMute(videoRef.current.muted)
    }
  }

  const handleSeek = (e: React.ChangeEvent<HTMLInputElement>) => {
    const video = videoRef.current
    if (!video) return
    const seekTime = parseFloat(e.target.value)
    video.currentTime = seekTime
    setCurrentTime(seekTime)
  }

  return {
    isHovered,
    isPlaying,
    isMute,
    handleMouseEnter,
    handleMouseLeave,
    togglePlay,
    toggleAudio,
    handleSeek,
    currentTime,
    setCurrentTime,
    duration,
    setDuration,
  }
}

export default useVideoControls
